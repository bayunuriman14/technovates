<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip', 25);
            $table->string('name', 100);
            $table->enum('status', ['active','non active'])->default('active');
            $table->string('email')->unique();
            $table->string('photo',255)->nullable();
            $table->date('birth')->nullable();
            $table->enum('gender', ['Male', 'Female'])->default('Male');
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
