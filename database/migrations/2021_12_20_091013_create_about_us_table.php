<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text_1');
            $table->text('text_2')->nullable();
            $table->text('text_3')->nullable();
            $table->text('text_4')->nullable();
            $table->text('v_link_1')->nullable();
            $table->text('v_link_2')->nullable();
            $table->text('v_link_3')->nullable();
            $table->text('v_link_4')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->integer('views')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_us');
    }
}
