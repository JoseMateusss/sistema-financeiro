<?php

namespace App\Http\Livewire\ChartAccount;

use Livewire\Component;
use App\Models\Company;
use App\Models\Subcategory;

class Index extends Component
{
    public $name;
    public $description;
    public $category_id;

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required|min:3',
    ];

    protected $listeners = [
        'sweetalertEvent', // for all events from sweetalert
        'sweetalertConfirmed', // only when confirm button is clicked
        'sweetalertDenied' => 'onDeny', // if you want a custom method name
        'sweetalertDismissed',
    ];

    public function doSomething($company_id)
    {
        $this->category_id = $company_id;
        $this->dispatchBrowserEvent('show-form');
    }

    public function saveSubcategory()
    {
        $this->validate();
        Subcategory::create([
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->category_id
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('hide-form');
    }

    public function render()
    {
        $companies = Company::all();
        return view('livewire.chart-account.index', [
            'companies' => $companies
        ]);
    }
}