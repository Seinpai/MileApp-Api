<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Package extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'packages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
