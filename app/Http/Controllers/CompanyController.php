<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use App\Http\Requests\Company\CompanyRequest;

class CompanyController extends Controller
{
    private $flasher;
    private $company;
    
    public function __construct(FlasherInterface $flasher, Company $company)
    {
        $this->flasher = $flasher;
        $this->company = $company;
    }
    
    public function index()
    {
        $companies = $this->company->all(); 
        return view('company.index', ['companies' => $companies]);
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(CompanyRequest $companyRequest)
    {
        try {
            $this->company->create($companyRequest->all());
            $this->flasher->addSuccess('Nova categoria adicionada', 'Sucesso');
            return redirect()->route('companies.index');
        
        } catch (\Throwable $th) {
            $this->flasher->addError('Ocorreu um error', 'Erro');
            return back()->withInput();
        }
    }
}
