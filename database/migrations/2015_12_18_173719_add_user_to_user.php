<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class AddUserToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $usersTest = DB::table('users')->where('name', 'test')->first();
        if ($usersTest == null){
            DB::table('users')->insert(
                array(
                    'id' => 1,
                    'name' => 'test',
                    'email' => 'test@test.com',
                    'password' => Hash::make('test')
                )
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->where('id', '=', 1)->delete();
    }
}
