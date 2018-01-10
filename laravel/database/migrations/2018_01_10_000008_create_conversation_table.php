<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateConversationTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'conversation';
    /**
     * Run the migrations.
     * @table conversation
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_chat');
            $table->timestamp('time')->nullable();
            $table->string('status', 45)->nullable();
            $table->integer('id_user1');
            $table->integer('id_user2');

            $table->index(["id_user1"], 'fk_conversation_user1_idx');

            $table->index(["id_user2"], 'fk_conversation_user2_idx');


            $table->foreign('id_user1', 'fk_conversation_user1_idx')
                ->references('id_user')->on('user')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_user2', 'fk_conversation_user2_idx')
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
