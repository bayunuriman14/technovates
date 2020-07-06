<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassFunctionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('classfunction'))
        {
            Schema::create('classfunction', function(Blueprint $table)
            {
                $table->engine = 'InnoDB';
                /* Primary Key */
                $table->increments('id');

                /* Main Data*/
                $table->string('class');
                $table->string('function');
                $table->string('alias')->nullable();
                $table->string('method')->nullable();
                $table->string('route')->nullable();
                $table->string('action')->nullable();
                
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
        Schema::drop('classfunction');
    }
}
