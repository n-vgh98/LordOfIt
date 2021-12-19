<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('text_1');
            $table->text('text_2')->nullable();
            $table->text('text_3')->nullable();
            $table->text('text_4')->nullable();
            $table->text('v_link_1');
            $table->text('v_link_2')->nullable();
            $table->text('v_link_3')->nullable();
            $table->text('v_link_4')->nullable();
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->integer('views')->default(0);
            $table->tinyinteger('status')->default(1);
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
