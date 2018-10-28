<?php
namespace App\Repositories\Criteria\Blog;
use App\Repositories\Contracts\CriteriaInterface;
use App\Repositories\Contracts\RepositoryInterface;

class GetDataByStatus implements CriteriaInterface {
  public function apply($model, RepositoryInterface $repository)
  {
    $query = $model->where('id', '>', 120);
    return $query;
  }
}