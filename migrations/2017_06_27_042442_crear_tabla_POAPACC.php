<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPOAPACC extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('POAPACC', function (Blueprint $table) {
      $table->increments('id_acc' );
      $table->string    ('name'   );
      $table->string    ('slug'   )->unique();
      $table->text      ('descrip')->nullable();
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
    Schema::dropIfExists('POAPACC');
  }
}
