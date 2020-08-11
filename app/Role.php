<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role
 *
 * @package App
 * @property string $title
*/
class Role extends Model
{
    use SoftDeletes;
    protected $fillable = ['title'];
    
    
}
