<?php

namespace sisTaller;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    protected $primaryKey = 'idclient';
    public $timestamp = true;
    protected $fillable=["nombre", "cif","direccion","telefono"];
}
