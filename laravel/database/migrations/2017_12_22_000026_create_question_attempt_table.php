<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateQuestionAttemptTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'question_attempt';
    /**
     * Run the migrations.
     * @table question_attempt
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_question_attempt');
            $table->integer('question_id_question');
            $table->text('question_summary')->nullable();
            $table->timestamp('time_modified')->nullable();

            $table->index(["question_id_question"], 'fk_question_attempt_question1_idx');


            $table->foreign('question_id_question', 'fk_question_attempt_question1_idx')
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
