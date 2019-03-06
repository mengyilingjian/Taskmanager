<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id',7)->comment('用户id');
            $table->string('name',100)->comment('用户昵称');
            $table->string('email',100)->unique()->comment('用户邮箱，唯一的');  //邮箱唯一
            $table->string('telphone',100)->nullable()->comment('手机号码')->index();  //手机号码
            $table->timestamp('email_verified_at')->nullable()->comment('邮箱验证时间');   //可以为空
            $table->string('password',100)->comment('登录密码');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
