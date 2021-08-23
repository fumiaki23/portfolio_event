<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('posts')) {
            Schema::create('posts', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title', 20);
                $table->string('place', 20);
                $table->integer('applicants');
                $table->text('body');
                $table->string('name');
                $table->text('content');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
