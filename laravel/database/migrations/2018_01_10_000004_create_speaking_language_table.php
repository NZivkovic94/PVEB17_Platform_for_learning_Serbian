<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateSpeakingLanguageTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'speaking_language';
    /**
     * Run the migrations.
     * @table speaking_language
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id_language', 3)->nullable();
            $table->integer('id_user')->nullable();

            $table->index(["id_user"], 'fk_language_has_user_user1_idx');

            $table->index(["id_language"], 'fk_language_has_user_language1_idx');

            $table->primary(["id_language"], 'id_language_PRIMARY');
            $table->primary(["id_user"], 'id_user_PRIMARY');


            $table->foreign('id_language', 'fk_language_has_user_language1_idx')
                ->references('id_language')->on('language')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_user', 'fk_language_has_user_user1_idx')
                ->references('id_user')->on('user')
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
