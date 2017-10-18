<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPOAPROL extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('POAPROL', function (Blueprint $table) {
      $table->increments('id_rol'     );
      $table->string    ('name',    50);
      $table->string    ('slug'       )->unique();
      $table->text      ('descrip'    )->nullable();
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
    Schema::dropIfExists('POAPROL');
  }
}
