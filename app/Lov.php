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
class Lov extends Model
{
    use SoftDeletes;

    protected $fillable = ['par_id', 'def_id', 'val_id', 'val_dsc'];
    
}
