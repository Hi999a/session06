<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinhViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinh_viens', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten', 100);
            $table->string('hinh_anh',255);
            $table->string('que_quan',255)->nullable();
            $table->tinyInteger('gio_tinh')->default(1);
            $table->unsignedBigInteger('lop_hoc_id');
            $table->foreign('lop_hoc_id')->references('id')->on('lop_hocs');
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
        Schema::dropIfExists('sinh_viens');
    }
}
