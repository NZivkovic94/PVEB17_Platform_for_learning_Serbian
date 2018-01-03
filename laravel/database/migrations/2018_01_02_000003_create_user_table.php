<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUserTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'user';
    /**
     * Run the migrations.
     * @table user
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_user');
            $table->string('name', 45);
            $table->string('last_name', 45);
            $table->string('password', 150);
            $table->date('birth_date')->nullable();
            $table->string('email', 45);
            $table->string('phone_number', 45)->nullable();
            $table->string('adress', 45)->nullable();
            $table->string('country', 45)->nullable();
            $table->string('city', 45)->nullable();
            $table->string('timezone', 45)->nullable();
            $table->string('username', 45);
            $table->timestamp('first_login')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->timestamp('current_login')->nullable();
            $table->timestamp('last_logout')->nullable();
            $table->char('profile_picture_url')->nullable();
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
