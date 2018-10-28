<?php

namespace App\Repositories\Repository;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\User;
use App\Repositories\Criteria\Blog\GetDataByStatus;
use Datatables;

class UserRepository extends BaseRepository
{
  function model()
  {
  	return User::class;
  }

  public function boot()
  {
  	$this->pushCriteria(new GetDataByStatus());
  }
}