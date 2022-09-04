<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Ver Categorias', 'Editar Categorias', 'Deletar Categorias', 'Criar Categorias'] as $name) {
            Permission::create([
                'name' => $name
            ]);
        }
    }
}
