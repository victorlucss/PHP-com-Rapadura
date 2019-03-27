<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Article extends Migration {
    public function up(){        

        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('author', 60);
            $table->longText('article');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    public function down(){
        Schema::dropIfExists('article');
    }
}
