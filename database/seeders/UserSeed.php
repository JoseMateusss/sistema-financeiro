<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt(123456789)
        ])->roles()->attach(1);

        User::create([
            'name' => 'Financeiro contas à pagar',
            'email' => 'contasapagar@gmail.com',
            'password' => bcrypt(123456789)
        ])->roles()->attach(2);

        User::create([
            'name' => 'Financeiro contas à receber',
            'email' => 'contasareceber@gmail.com',
            'password' => bcrypt(123456789)
        ])->roles()->attach(3);
    }
}
