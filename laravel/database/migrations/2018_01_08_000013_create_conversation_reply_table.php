<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateConversationReplyTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'conversation_reply';
    /**
     * Run the migrations.
     * @table conversation_reply
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_reply');
            $table->longText('reply')->nullable();
            $table->timestamp('time')->nullable();
            $table->string('status', 45)->nullable();
            $table->integer('id_user');
            $table->integer('id_chat');

            $table->index(["id_user"], 'fk_conversation_reply_user1_idx');

            $table->index(["id_chat"], 'fk_conversation_reply_conversation1_idx');


            $table->foreign('id_user', 'fk_conversation_reply_user1_idx')
                ->references('id_user')->on('user')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_chat', 'fk_conversation_reply_conversation1_idx')
                ->references('id_chat')->on('conversation')
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
