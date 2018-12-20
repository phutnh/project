<?php

namespace DHPT\Models;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
  protected $fillable = [
    'messages', 'url', 'method', 'ip', 'agent', 'user_id'
  ];
}
