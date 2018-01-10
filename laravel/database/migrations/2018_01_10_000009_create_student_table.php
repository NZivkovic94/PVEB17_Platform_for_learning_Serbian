<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateStudentTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'student';
    /**
     * Run the migrations.
     * @table student
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_student');
            $table->string('id_native_language', 3)->nullable();
            $table->integer('id_institution')->nullable();

            $table->index(["id_institution"], 'fk_student_institution1_idx');

            $table->index(["id_native_language"], 'fk_student_language1_idx');


            $table->foreign('id_native_language', 'fk_student_language1_idx')
                ->references('id_language')->on('language')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_institution', 'fk_student_institution1_idx')
                ->references('id_institution')->on('institution')
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
