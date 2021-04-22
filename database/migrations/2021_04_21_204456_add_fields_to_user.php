<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('telefono');
            $table->string('nombre_usuario');
            $table->timestamp('fecha_ingreso')->nullable();
            $table->unsignedBigInteger('rol_id');
            $table->unsignedBigInteger('promocion_tipo')->nullable();
            $table->foreign('rol_id')->on('roles')->references('id');
            $table->foreign('promocion_tipo')->on('promociones')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            //
        });
    }
}
