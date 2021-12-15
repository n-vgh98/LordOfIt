<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_links', function (Blueprint $table) {
            $table->id();
            $table->text("instagram_link");
            $table->text("twitter_link");
            $table->text("facebook_link");
            $table->text("linkedin_link");
            $table->text("social_1")->nullable();
            $table->text("social_1_icon")->nullable();
            $table->text("social_2")->nullable();
            $table->text("social_2_icon")->nullable();
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
        Schema::dropIfExists('footer_links');
    }
}
