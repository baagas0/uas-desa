<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('report_number', 50);
            $table->date('order_date');
            $table->string('order_project');
            $table->string('debitur_name');
            $table->text('asset_location');
            $table->string('report_type');
            $table->string('upload_spk');
            $table->string('type_asset');
            $table->foreignId('grader_id')->references('id')->on('employees')
                ->onDelete('cascade');
            $table->date('finish_date')->nullable();
            $table->enum('status', ['Order', 'On Progress', 'Complete']);
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
        Schema::dropIfExists('orders');
    }
}
