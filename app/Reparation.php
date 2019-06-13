<?php

namespace sisTaller;

use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    protected $table = 'reparation';
    protected $primaryKey = 'idreparation';
    public $timestamp = true;
    protected $fillable=["idcar", "desrepara","fecha","kilometros"];
        
}
