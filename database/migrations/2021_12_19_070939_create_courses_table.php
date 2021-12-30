<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("type");
            $table->string("level");
            $table->string("section");
            $table->text("pre_need")->default("ندارد");
            $table->text("price")->comment("dalil inke text hast ine ke mikhan benevisam dakhelesh va momkene ziad beshe");
            $table->string("lang");
            $table->text("description");
            $table->text("topic_list");
            $table->text("meta_keywords");
            $table->text("meta_description");
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
        Schema::dropIfExists('courses');
    }
}
