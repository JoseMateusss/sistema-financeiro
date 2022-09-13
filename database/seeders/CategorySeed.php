<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Administrativo',
            'description' => 'Setor referente ao núcleo administrativo',
            'status' => 1,
            'company_id' => 4
        ]);

        Category::create([
            'name' => 'Folha de pagamento',
            'description' => 'Pagamento dos coloboradores',
            'status' => 1,
            'company_id' => 1
        ]);

        Category::create([
            'name' => 'Estrutura',
            'description' => 'Referente a estrutura da empresa',
            'status' => 1,
            'company_id' => 2
        ]);

        Category::create([
            'name' => 'Folha de pagamento',
            'description' => 'pagamento dos coloboradores',
            'status' => 1,
            'company_id' => 2
        ]);

        Category::create([
            'name' => 'Almoxarifado',
            'description' => 'Setor de limpeza',
            'status' => 1,
            'company_id' => 2
        ]);

        Category::create([
            'name' => 'Hospedagens',
            'description' => 'pagamento referente a hospedagem dos participantes',
            'status' => 1,
            'company_id' => 3
        ]);

        Category::create([
            'name' => 'Contas pessoais',
            'description' => 'Pagamentos pessoais',
            'status' => 1,
            'company_id' => 4
        ]);

        Category::create([
            'name' => 'Moradia',
            'description' => 'Pagamentos relacionado a moradia',
            'status' => 1,
            'company_id' => 4
        ]);

        Category::create([
            'name' => 'Carro',
            'description' => 'Pagamentos destinados ao uso do carro',
            'status' => 1,
            'company_id' => 4
        ]);
    }
}
