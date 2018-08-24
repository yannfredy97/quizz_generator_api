<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_id'); 
            $table->string('title');
            $table->timestamps();
            $table->foreign('course_id')
                  ->references('id')
                  ->on('courses')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chapters', function(Blueprint $table) {
            $table->dropForeign('chapters_course_id_foreign');
        });
        Schema::dropIfExists('chapters');
    }
}
