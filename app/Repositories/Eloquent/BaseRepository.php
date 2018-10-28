<?php 

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Contracts\RepositoryCriteriaInterface;
use App\Repositories\Contracts\CriteriaInterface;
use Illuminate\Support\Collection;
use Exception;
use Illuminate\Database\Eloquent\Builder;

abstract class BaseRepository implements RepositoryInterface, RepositoryCriteriaInterface
{
  private $app;
  protected $model;
  protected $criteria;
  protected $skipCriteria = false;
  public $query;

  public function __construct(App $app, Collection $collection)
  {
    $this->app = $app;
    $this->criteria = $collection;
    $this->resetScope();
    $this->makeModel();
    $this->boot();
    $this->query = $this->getQuery();
  }

  abstract function model();

  public function boot()
  {
    
  }

  public function getQuery()
  {
    $this->applyCriteria();
    if ($this->model instanceof Builder) {
      $results = $this->model;
    } else {
      $results = $this->model->query();
    }
    return $results;
  }

  public function makeModel() {
    $model = $this->app->make($this->model());

    if (!$model instanceof Model)
      throw new Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
    
    return $this->model = $model;
  }

  public function resetScope() {
    $this->skipCriteria(false);
    return $this;
  }

  public function skipCriteria($status = true){
    $this->skipCriteria = $status;
    return $this;
  }

  public function getCriteria() {
    return $this->criteria;
  }

  public function getByCriteria(CriteriaInterface $criteria) {
    $this->model = $criteria->apply($this->model, $this);
    $results = $this->model->get();
    return $results;  
  }

  public function pushCriteria($criteria) {
    if (is_string($criteria)) {
      $criteria = new $criteria;
    }
    if (!$criteria instanceof CriteriaInterface) {
      throw new Exception("Class " . get_class($criteria) . " must be an instance of CriteriaInterface");
    }

    $this->criteria->push($criteria);

    return $this;
  }

  public function applyCriteria() {
    if($this->skipCriteria === true)
      return $this;

    foreach($this->getCriteria() as $criteria) {
      if($criteria instanceof CriteriaInterface)
        $this->model = $criteria->apply($this->model, $this);
    }

    return $this;
  }

  public function popCriteria($criteria)
  {
    $this->criteria = $this->criteria->reject(function ($item) use ($criteria) {
      if (is_object($item) && is_string($criteria)) {
        return get_class($item) === $criteria;
      }

      if (is_string($item) && is_object($criteria)) {
        return $item === get_class($criteria);
      }

      return get_class($item) === get_class($criteria);
    });

    return $this;
  }

  public function resetCriteria()
  {
    $this->criteria = new Collection();

    return $this;
  }

}