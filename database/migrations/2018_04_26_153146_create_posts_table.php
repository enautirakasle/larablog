<?php

use Illuminate\Support\Facades\Schema;
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
            
            $table->integer("user_id")->unsigned();
            $table->integer("category_id")->unsigned();

            $table->string("name", 128);
            $table->string("slug", 128)->unique(); //para url amigable
            
            $table->mediumText("excerpt")->nullable(); //estracto del post
            $table->text("body");
            $table->enum("status", ['PUBLISHED', 'DRAFT'])->default('DRAFT'); //publicado o borrador
            
            $table->string("file", 128)->nullable();
            
            $table->timestamps();
         
            //relations
            $table->foreign("user_id")->references("id")->on("users")
            	->onDelete("cascade")
            	->onUpdate("cascade");
            
            $table->foreign("category_id")->references("id")->on("categories")
            	->onDelete("cascade")
            	->onUpdate("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
