<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Livre extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'titre' => $this->titre,
            'resume' => sous_chaine( $this->resume,0,100),
            'slug' => $this->slug,
            'categorie' => new Categorie( $this->category),
            'date_publication' => human_date($this->date_publication),
            'auteur' => $this->auteur,
            'livre_numerique' => $this->livre_numerique,
            'couverture' => $this->couverture,
            'fichier_pdf' => $this->fichier_pdf
        ];
    }
}
