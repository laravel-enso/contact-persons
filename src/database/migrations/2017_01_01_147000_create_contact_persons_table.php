<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactPersonsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('contact_persons', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('owner_id')->unsigned()->index()->nullable();
            $table->foreign('owner_id')->references('id')->on('owners')->onUpdate('restrict')->onDelete('restrict');

            $table->string('name');
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::dropIfExists('contact_persons');
    }
}
