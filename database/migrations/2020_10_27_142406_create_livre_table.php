<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('livres', function (Blueprint $table) {
                $table->increments('id');
                $table->string('titre')->nullable();
                $table->date('date_publication')->nullable();
                $table->string('livre_numerique')->nullable();
                $table->text('resume')->nullable();
                $table->integer('categorie')->nullable();
                $table->string('auteur')->nullable();
                $table->string('slug')->nullable();
                $table->text('couverture')->nullable();
                $table->text('fichier_pdf')->nullable();

                $table->timestamps();
                $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livres');
    }
}
