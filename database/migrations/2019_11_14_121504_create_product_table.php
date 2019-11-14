<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code',50)->unique(); //không cho phép cột mã sản phẩm trùng
            $table->string('name');
            $table->string('slug');
            $table->decimal('price', 18, 0)->default(0); //mặc định là 0 nếu không có giá trị
            $table->tinyInteger('featured')->unsigned(); //kiểu không dấu
            $table->tinyInteger('state')->unsigned(); 
            $table->text('info')->nullable(); //cho phép null
            $table->text('describe')->nullable();
            $table->string('img');
            //Tạo khoá ngoại liên kết đến khoá chính của bảng category
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
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
        Schema::dropIfExists('product');
    }
}
