<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('code')->comment('礼品码');
            $table->string('code_status')->default('unfreeze')->comment('礼品码是否禁用');
            $table->unsignedInteger('receiver_story_id')->nullable()->comment('兑换章节ID');
            $table->unsignedInteger('receive_user_id')->nullable()->comment('兑换章节ID');
            $table->timestamp('receive_time')->nullable()->comment('兑换时间');
            $table->timestamp('code_expire_time')->nullable()->comment('礼品码过期时间');
            $table->string('vendor')->nullable()->comment('渠道');
            $table->string('vendor_id')->nullable()->comment('渠道ID');
            $table->unsignedInteger('code_record_id')->nullable()->comment('生成记录的ID');
            $table->unsignedInteger('package_id')->nullable();
            $table->string('receiver_vendor_id')->nullable()->comment('渠道ID');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gift_codes');
    }
}
