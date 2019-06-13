<?php

namespace sisTaller;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'car';
    protected $primaryKey = 'idcar';
    public $timestamp = true;
    protected $fillable=["idclient", "matricula","modelo"];
}
