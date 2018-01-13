<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
  {
    Schema::create('question', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('quiz_id')->default(0);
      $table->text('text');
      $table->text('notes');
      $table->integer('answer_type_id');
      $table->unsignedInteger('updated_by_user_id');
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
    Schema::dropIfExists('question');
  }
}
