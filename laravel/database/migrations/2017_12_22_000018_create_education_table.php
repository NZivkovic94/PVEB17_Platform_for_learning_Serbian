<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateEducationTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'education';
    /**
     * Run the migrations.
     * @table education
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_institution');
            $table->integer('id_professor');
            $table->date('graduated_date')->nullable();
            $table->string('degree', 45)->nullable();

            $table->index(["id_institution"], 'fk_institution_has_professor_institution1_idx');

            $table->index(["id_professor"], 'fk_institution_has_professor_professor1_idx');


            $table->foreign('id_institution', 'fk_institution_has_professor_institution1_idx')
                ->references('id_institution')->on('institution')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_professor', 'fk_institution_has_professor_professor1_idx')
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
