<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('matricsno')->unique();

            // Custom columns
            $table->string('role');
            $table->string('image');
            $table->string('status');
            $table->string('gender');
            $table->string('department');
            $table->text('description')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE communities ADD image MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('communities');
    }
}
