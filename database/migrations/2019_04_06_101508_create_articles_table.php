<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::create('articles', function(Blueprint $table) {
                $table->increments('id');
                $table->string('titre')->nullable();
                $table->text('contenu')->nullable();
                $table->date('date_publication')->nullable();
                $table->text('image')->nullable();
                $table->integer('categorie')->nullable();
                $table->boolean('brouillon')->nullable();
                $table->integer('auteur')->nullable();
                $table->string('slug')->nullable();

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
        Schema::drop('articles');
    }

}
