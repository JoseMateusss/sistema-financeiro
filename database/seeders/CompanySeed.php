<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'K&M consultoria empresarial',
            'cnpj' => '2020.2020.2020-21'
        ]);

        Company::create([
            'name' => 'K&M gestão de pessoas',
            'cnpj' => '2020.2020.2020-22'
        ]);

        Company::create([
            'name' => 'K&M eventos',
            'cnpj' => '2020.2020.2020-23'
        ]);

        Company::create([
            'name' => 'Kelermane',
            'cnpj' => '2020.2020.2020-24'
        ]);

    }
}
