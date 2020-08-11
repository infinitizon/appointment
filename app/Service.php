<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'price'];
	public function employees()
    {
        return $this->belongsToMany('App\Employee');
    }
}
