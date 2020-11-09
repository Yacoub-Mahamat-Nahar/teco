<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Livre extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'livres';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titre', 'resume','slug','categorie','date_publication','auteur','livre_numerique','couverture','fichier_pdf'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function image()
    {
       return $this->hasOne('App\Media','id');
    }

    public function category()
    {
      return $this->belongsTo(Categorie::class,'categorie');
    }
}
