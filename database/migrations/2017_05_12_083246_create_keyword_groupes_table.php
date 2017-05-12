<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordGroupesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keyword_groupes', function (Blueprint $table) {
            $table->integer('keyword_id')->unsigned();
            $table->integer('groupe_id')->unsigned();
            $table->foreign('keyword_id')->references('id')->on('keywords')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('groupe_id')->references('id')->on('groupes')->onDelete('cascade')->onUpdate('cascade');
            $table->primary('keyword_id', 'groupe_id');
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
        Schema::dropIfExists('keyword_groupes');
    }
}
