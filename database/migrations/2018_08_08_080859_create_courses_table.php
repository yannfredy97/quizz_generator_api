<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('level_id'); 
            $table->unsignedInteger('subject_id'); 
            $table->foreign('level_id')->references('id')->on('levels')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            
            $table->foreign('subject_id')->references('id')->on('subjects')
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
        Schema::table('courses', function(Blueprint $table) {
			$table->dropForeign('courses_level_id_foreign');
            $table->dropForeign('courses_subject_id_foreign');
        });
        
        Schema::dropIfExists('courses');
    }
}
