<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/*
|--------------------------------------------------------------------------
| Model CategorieArticle
|--------------------------------------------------------------------------
|
| @Autor Dominique Damba
| @email dominiquedamba@outlook.com
| @created 27/10/2020
|
*/


class CategorieArticle extends Model
{

     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categorie_article';


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'description','slug'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
