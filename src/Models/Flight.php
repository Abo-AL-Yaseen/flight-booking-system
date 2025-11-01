<?php

namespace Src\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $table = 'flight';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
