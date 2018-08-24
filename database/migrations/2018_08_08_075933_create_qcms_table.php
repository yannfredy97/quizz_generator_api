<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQcmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qcms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('chapter_id');
            $table->text('question');
            $table->text('answer_1');
            $table->text('answer_2');
            $table->text('answer_3');
            $table->text('answer_4');
            $table->text('answer_5');
            $table->text('answer_6');
            $table->text('answer_7');
            $table->text('answer_8');
            $table->text('answer_9');
            $table->unsignedInteger('correct_answers');
            $table->string('image_filename');
            $table->foreign('chapter_id')
            ->references('id')
            ->on('chapters')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            
            
            
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
        Schema::table('qcms', function(Blueprint $table) {
            $table->dropForeign('qcms_chapter_id_foreign');
        });
        Schema::dropIfExists('qcms');
    }
}
