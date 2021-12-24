<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_samples', function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id")->constrained("work_sample_categories")->onDelete("cascade")->onUpdate("cascade");
            $table->string("title");
            $table->text("text")->nullable();
            $table->text("link")->nullable();
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
        Schema::dropIfExists('work_samples');
    }
}
