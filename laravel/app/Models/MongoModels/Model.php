<?php

namespace App\Models\MongoModels;

use Moloquent as BaseModel;

class Model extends BaseModel
{
    protected $connection = 'mongodb';
    protected $guarded = ['_id'];
}
