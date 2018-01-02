<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateChatMessagesCurrentTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'chat_messages_current';
    /**
     * Run the migrations.
     * @table chat_messages_current
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_chat_messages_current');
            $table->integer('id_chat');

            $table->index(["id_chat"], 'fk_chat_messages_current_chat1_idx');


            $table->foreign('id_chat', 'fk_chat_messages_current_chat1_idx')
                ->references('id_chat')->on('chat')
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
