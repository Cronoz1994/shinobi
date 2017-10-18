<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPOAPPERO extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('POAPPERO', function (Blueprint $table) {
      $table->integer   ('id_rol')->unsigned()->index();
      $table->integer   ('id_per')->unsigned()->index();
      $table->timestamps();

      $table->primary(['id_rol', 'id_per']);

      $table->foreign('id_rol')->references('id_rol')->on('POAPROL' )->onDelete('cascade');
      $table->foreign('id_per')->references('id_per')->on('POAMPERS')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migration.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('POAPPERO');
  }
}
