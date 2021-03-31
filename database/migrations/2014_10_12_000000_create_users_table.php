<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('First Name');
			$table->string('Last Name');
			$table->string('Gender',10);
			$table->date('Date of Birth');
			$table->string('Nationality');
			$table->string('Ethnicity');
			$table->string('Primary Sport');
			$table->date('Planned University Entry Date');
			$table->string('School Attended/Attending');
			$table->string('Interested Area(s) of study');
			$table->string('Preffered Location');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
