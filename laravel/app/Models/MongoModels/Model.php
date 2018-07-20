<?php

namespace App\Models\MongoModels;

use Jenssegers\Mongodb\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    protected $connection = 'mongodb';

    protected $guarded = ['_id'];
}
