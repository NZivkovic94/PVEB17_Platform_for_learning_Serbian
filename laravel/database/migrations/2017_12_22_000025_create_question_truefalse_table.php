<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateQuestionTruefalseTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'question_truefalse';
    /**
     * Run the migrations.
     * @table question_truefalse
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_question_truefalse');
            $table->integer('id_question');
            $table->integer('true_answer')->nullable();
            $table->integer('false_answer')->nullable();

            $table->index(["id_question"], 'fk_question_truefalse_question1_idx');


            $table->foreign('id_question', 'fk_question_truefalse_question1_idx')
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
