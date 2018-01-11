<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateLessonTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'lesson';
    /**
     * Run the migrations.
     * @table lesson
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_lesson');
            $table->string('title', 100);
            $table->text('description_lesson');
            $table->integer('level')->nullable();
            $table->date('date_created')->nullable();
            $table->integer('id_author');
            $table->char('video_url');
            $table->boolean('validated')->nullable();
            $table->float('longitude')->nullable();
            $table->float('latitude')->nullable();

            $table->index(["id_author"], 'fk_lesson_professor1_idx');


            $table->foreign('id_author', 'fk_lesson_professor1_idx')
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
