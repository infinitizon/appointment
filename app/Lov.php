<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @package App
 * @property string $title
*/
class Lov extends Model
{
    protected $fillable = ['par_id', 'def_id', 'val_id', 'val_dsc'];
    
}
