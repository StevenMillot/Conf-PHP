<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('slug', 100);                            //string url
            $table->string('excerpt', 255);                         //Extrait de l'article
            $table->text('content');
            $table->dateTime('date_start');                         //Début de conference
            $table->dateTime('date_end');                           //Fin de conference
            $table->string('thumbnail_link');                       //Lien image
            $table->string('url_site');                             //Lien site
            $table->enum('status', ['publish', 'unpublish'])->default('publish');
            $table->integer('user_id')->unsigned()->nullable();     //Champs user_id //unsigned=int positif
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL');                             //Paramètre user_id
            $table->softDeletes();                                  //Suppression douce
            $table->timestamps();                                   //Date de création
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
