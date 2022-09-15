<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class ChartAccountsController extends Controller
{
    public function __invoke()
    {
        $companies = Company::all();
        return view('chart-accounts', [
            'companies' => $companies
        ]);
    }
}
