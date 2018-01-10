<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateCreatedByStudentTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'created_by_student';
    /**
     * Run the migrations.
     * @table created_by_student
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_student');
            $table->integer('id_lesson');
            $table->integer('id_professor')->nullable();
            $table->boolean('validated')->nullable()->default('0');
            $table->smallInteger('score')->nullable();

            $table->index(["id_professor"], 'fk_modified_by_professor1_idx');

            $table->index(["id_lesson"], 'fk_student_has_lesson_lesson2_idx');

            $table->index(["id_student"], 'fk_student_has_lesson_student2_idx');


            $table->foreign('id_student', 'fk_student_has_lesson_student2_idx')
                ->references('id_student')->on('student')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_lesson', 'fk_student_has_lesson_lesson2_idx')
                ->references('id_lesson')->on('lesson')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_professor', 'fk_modified_by_professor1_idx')
                ->references('id_professor')->on('professor')
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
