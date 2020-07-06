<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('role_access'))
        {
            Schema::create('role_access', function(Blueprint $table)
            {
                $table->engine = 'InnoDB';
                /* Primary Key */
                $table->increments('id',10);

                /* Main Data*/
                $table->string('description')->nullable();
                
                /* Foreign Key */
                $table->integer('id_group')->unsigned();
                $table->foreign('id_group')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');
                $table->integer('id_access')->unsigned();
                $table->foreign('id_access')->references('id')->on('classfunction')->onDelete('cascade')->onUpdate('cascade');
                
                /* Action Data */
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
        Schema::drop('role_access');
    }
}
