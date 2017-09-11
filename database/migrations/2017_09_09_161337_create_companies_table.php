<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('user_id')->index();
            $table->string('name');
            $table->string('owner')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('site')->nullable();
            $table->string('address')->nullable();
            $table->string('current_account')->nullable();
            $table->string('bank')->nullable();
            $table->string('town')->nullable();
            $table->integer('mfo')->nullable();
            $table->integer('itn')->nullable();
            $table->decimal('tax', 10, 3)->default(1);
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
        Schema::dropIfExists('companies');
    }
}
