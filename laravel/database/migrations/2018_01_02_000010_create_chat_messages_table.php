<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateChatMessagesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'chat_messages';
    /**
     * Run the migrations.
     * @table chat_messages
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_chat_messages');
            $table->integer('id_chat');
            $table->text('message_text')->nullable();

            $table->index(["id_chat"], 'fk_chat_messages_chat1_idx');


            $table->foreign('id_chat', 'fk_chat_messages_chat1_idx')
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
