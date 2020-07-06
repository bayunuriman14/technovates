<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('sitesetting'))
        {
            Schema::create('sitesetting', function(Blueprint $table)
            {
                $table->engine = 'InnoDB';
                /* Primary Key */
                $table->increments('id');

                /* Main Data*/
                $table->string('favicon')->nullable();
                $table->string('author')->nullable();
                $table->string('title');
                $table->string('keywords')->nullable();
                $table->text('description')->nullable();
                $table->string('logo')->nullable();
                $table->string('image')->nullable();
                $table->string('banner')->nullable();
                $table->string('video')->nullable();
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->string('facebook')->nullable();
                $table->string('twitter')->nullable();
                $table->string('gplus')->nullable();
                $table->text('address')->nullable();
                $table->text('maps')->nullable();
                $table->text('footer')->nullable();

                
                /* Action Data */
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
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
        Schema::drop('sitesetting');
    }
}
