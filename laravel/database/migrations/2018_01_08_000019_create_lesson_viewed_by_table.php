<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateLessonViewedByTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'lesson_viewed_by';
    /**
     * Run the migrations.
     * @table lesson_viewed_by
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_user');
            $table->integer('id_lesson');
            $table->timestamp('time')->nullable();

            $table->index(["id_user"], 'fk_user_has_lesson_user1_idx');

            $table->index(["id_lesson"], 'fk_user_has_lesson_lesson1_idx');


            $table->foreign('id_user', 'fk_user_has_lesson_user1_idx')
                ->references('id_user')->on('user')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_lesson', 'fk_user_has_lesson_lesson1_idx')
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
