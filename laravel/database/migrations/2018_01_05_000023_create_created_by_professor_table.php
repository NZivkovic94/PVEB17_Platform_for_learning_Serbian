<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateCreatedByProfessorTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'created_by_professor';
    /**
     * Run the migrations.
     * @table created_by_professor
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('id_professor');
            $table->increments('id_lesson');
            $table->timestamp('last_modified')->nullable();
            $table->char('description')->nullable();

            $table->index(["id_professor"], 'fk_professor_has_lesson_professor1_idx');

            $table->index(["id_lesson"], 'fk_professor_has_lesson_lesson1_idx');


            $table->foreign('id_professor', 'fk_professor_has_lesson_professor1_idx')
                ->references('id_professor')->on('professor')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_lesson', 'fk_professor_has_lesson_lesson1_idx')
                ->references('id_lesson')->on('lesson')
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
