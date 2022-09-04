<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Super Admin', 'Admin', 'Financeiro contas à pagar', 'Financeiro contas à receber'] as $name) {
            Role::create([
                'name' => $name
            ]);
        }
    }
}
