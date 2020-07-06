<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users'))
        {
            Schema::create('users', function(Blueprint $table)
            {
                $table->engine = 'InnoDB';
                /* Primary Key */
                $table->increments('id');

                /* Main Data*/
                $table->string('fullname');
                $table->string('name');
                $table->string('email')->unique();
                $table->string('username')->unique();
                $table->string('password',255);
                $table->string('image',255)->nullable();
                $table->string('token',255)->nullable();
                $table->dateTime('expired_start')->nullable();
                $table->dateTime('expired_end')->nullable();
                $table->enum('status', ['active','non active'])->default('active');
                $table->char('id_jobgroup', 20)->nullable();
                
                /* Foreign Key */
                $table->integer('id_group')->unsigned();
                $table->foreign('id_group')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');
                
                /* Action Data */
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
                $table->rememberToken();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
