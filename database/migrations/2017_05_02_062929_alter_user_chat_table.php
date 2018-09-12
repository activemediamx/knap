<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserChatTable extends Migration
{

    public function up()
    {
        DB::statement('ALTER TABLE `users_chat` DROP FOREIGN KEY `users_chat_admin_id_foreign`');
        DB::statement('ALTER TABLE `users_chat` DROP COLUMN `admin_id`');
        DB::statement('ALTER TABLE `users_chat` DROP FOREIGN KEY `users_chat_user_id_foreign`');
        DB::statement('ALTER TABLE `users_chat` DROP COLUMN `user_id`');
    }

    public function down()
    {

    }

}
