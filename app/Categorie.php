<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/*
|--------------------------------------------------------------------------
| Model Categorie
|--------------------------------------------------------------------------
|
| @Autor Dominique Damba
| @email dominiquedamba@outlook.com
| @created 27/10/2020
|
*/


class Categorie extends Model
{

     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categorie_livre';


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'description','slug'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function livres()
    {
        return $this->hasMany(Livre::class, 'categorie', 'id');
    }
}
