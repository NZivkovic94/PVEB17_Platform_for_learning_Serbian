<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateProfessorAddsQuestionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'professor_adds_question';
    /**
     * Run the migrations.
     * @table professor_adds_question
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_professor');
            $table->integer('id_question');
            $table->timestamp('time')->nullable();

            $table->index(["id_professor"], 'fk_professor_has_question_professor1_idx');

            $table->index(["id_question"], 'fk_professor_has_question_question1_idx');


            $table->foreign('id_professor', 'fk_professor_has_question_professor1_idx')
                ->references('id_professor')->on('professor')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_question', 'fk_professor_has_question_question1_idx')
                ->references('id_question')->on('question')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
