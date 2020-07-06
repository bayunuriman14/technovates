<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('languages'))
        {
            Schema::create('languages', function(Blueprint $table)
            {
                $table->engine = 'InnoDB';
                /* Primary Key */
                $table->increments('id');

                /* Main Data*/
                $table->string('lang_name');
                $table->string('lang_code');
                $table->string('lang_image')->nullable();
                $table->enum('status', ['active','non active'])->default('non active');
                
                /* Action Data */
                $table->string('created_by')->nullable();
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
        Schema::drop('languages');
    }
}
