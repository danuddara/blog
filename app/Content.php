<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Content extends Eloquent
{
  /**
   * database connectiviy to mongodb
   */
  protected $connection = 'mongodb';
  protected $collection = 'content';

  protected $fillable = [
    'title', 'description','tags'
  ];
}
