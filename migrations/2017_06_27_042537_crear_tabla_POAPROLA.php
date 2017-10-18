<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPOAPROLA extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('POAPROLA', function (Blueprint $table) {
      $table->integer   ('id_rol')->unsigned()->index();
      $table->integer   ('id_acc')->unsigned()->index();
      $table->timestamps();

      $table->primary(['id_rol', 'id_acc']);

      $table->foreign('id_rol')->references('id_rol')->on('POAPROL')->onDelete('cascade');
      $table->foreign('id_acc')->references('id_acc')->on('POAPACC')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('POAPROLA');
  }
}
