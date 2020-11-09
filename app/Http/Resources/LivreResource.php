<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LivreResource extends JsonResource
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
            'resume' => $this->resume,
            'slug' => $this->slug,
            'categorie' => new Categorie( $this->category),
            'date_publication' => $this->date_publication,
            'auteur' => $this->auteur,
            'livre_numerique' => $this->livre_numerique,
            'couverture' => $this->couverture,
            'fichier_pdf' => $this->fichier_pdf
        ];    }
}
