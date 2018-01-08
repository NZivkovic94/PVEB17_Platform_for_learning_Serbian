<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateVideoContentTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'video_content';
    /**
     * Run the migrations.
     * @table video_content
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_lesson');
            $table->text('description')->nullable();
            $table->string('transcript_url', 100)->nullable();
            $table->string('video_url', 45)->nullable();
            $table->string('vimeo_url', 45)->nullable();
            $table->string('vimeo_password', 45)->nullable();
            $table->string('youtube_url', 45)->nullable();
            $table->string('youtube_password', 45)->nullable();
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
