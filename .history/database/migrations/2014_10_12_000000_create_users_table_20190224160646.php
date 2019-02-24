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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->int('uid',7)->comment('用户uid');
            $table->string('name',100)->comment('用户昵称');
            $table->string('email',100)->('用户邮箱，唯一的')->unique();  //邮箱唯一
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            // 1	id主键	int(10)		UNSIGNED	否	无		AUTO_INCREMENT
            // 2	uid	int(10)		UNSIGNED	否	无	用户uid
            // 3	name	varchar(255)	utf8mb4_unicode_ci		否	无	用户昵称
            // 4	email索引	varchar(255)	utf8mb4_unicode_ci	否	无	用户邮箱
            // 5	telphone	char(12)	utf8mb4_unicode_ci		否	无	手机号码
            // 6	email_verified_at	timestamp			是	NULL	邮箱验证时间
            // 7	password	varchar(255)	utf8mb4_unicode_ci		否	无	登录密码
            // 8	remember_token	varchar(100)	utf8mb4_unicode_ci		是	NULL

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
