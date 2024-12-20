<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLogosTable extends Migration
{
    public function up()
    {
        Schema::table('logos', function (Blueprint $table) {
            $table->unsignedBigInteger('image_type_id')->nullable();
            $table->foreign('image_type_id', 'image_type_fk_10236704')->references('id')->on('image_types');
        });
    }
}
