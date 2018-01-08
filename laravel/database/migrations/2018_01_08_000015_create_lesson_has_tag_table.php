<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateLessonHasTagTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'lesson_has_tag';
    /**
     * Run the migrations.
     * @table lesson_has_tag
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id_tag', 10);
            $table->increments('id_lesson');
            $table->integer('id_professor')->nullable();
            $table->integer('id_administrator');

            $table->index(["id_tag"], 'fk_tag_has_lesson_tag1_idx');

            $table->index(["id_lesson"], 'fk_tag_has_lesson_lesson1_idx');

            $table->index(["id_professor"], 'fk_lesson_has_tag_professor1_idx');

            $table->index(["id_administrator"], 'fk_lesson_has_tag_administrator1_idx');


            $table->foreign('id_tag', 'fk_tag_has_lesson_tag1_idx')
                ->references('id_tag')->on('tag')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_lesson', 'fk_tag_has_lesson_lesson1_idx')
                ->references('id_lesson')->on('lesson')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_professor', 'fk_lesson_has_tag_professor1_idx')
                ->references('id_professor')->on('professor')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_administrator', 'fk_lesson_has_tag_administrator1_idx')
                ->references('id_administrator')->on('administrator')
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
