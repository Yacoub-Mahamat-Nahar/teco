<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'articles';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titre', 'contenu','slug','categorie','date_publication','auteur','brouillon','image','gallerie'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function image()
    {
       return $this->hasOne('App\Media','id');
    }

    public function category()
    {
      return $this->belongsTo(CategorieArticle::class,'categorie');
    }

    public function author()
    {
      return $this->belongsTo(User::class,'auteur');
    }
}
