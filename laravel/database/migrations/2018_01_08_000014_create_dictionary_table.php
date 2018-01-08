<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateDictionaryTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'dictionary';
    /**
     * Run the migrations.
     * @table dictionary
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_entry');
            $table->string('entry', 45);
            $table->string('example', 45)->nullable();
            $table->string('annotation', 45)->nullable();
            $table->integer('id_lesson')->nullable();

            $table->index(["id_lesson"], 'fk_dictionary_lesson1_idx');


            $table->foreign('id_lesson', 'fk_dictionary_lesson1_idx')
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
