<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateAfiliationTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'afiliation';
    /**
     * Run the migrations.
     * @table afiliation
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
            $table->date('started_working_date')->nullable();

            $table->index(["id_institution"], 'fk_Institution_has_Professor_Institution1_idx');

            $table->index(["id_professor"], 'fk_Institution_has_Professor_Professor1_idx');


            $table->foreign('id_institution', 'fk_Institution_has_Professor_Institution1_idx')
                ->references('id_institution')->on('institution')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_professor', 'fk_Institution_has_Professor_Professor1_idx')
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
