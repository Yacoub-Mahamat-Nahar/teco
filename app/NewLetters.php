<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewLetters extends Model
{
      /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'new_letters';


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['email','slug'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
