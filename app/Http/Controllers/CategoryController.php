<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use App\Http\Requests\Category\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index');
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $CategoryRequest,  FlasherInterface $flasher)
    {
        $status = 0;
        
        if($CategoryRequest->input('status')){
            $status = 1;
        }
        
        try {
            Category::create([
                'name' => $CategoryRequest->input('name'),
                'description' => $CategoryRequest->input('description'),
                'status' => $status
            ]);
            $flasher->addSuccess('Nova categoria adicionada', 'Sucesso');

            return view('category.index');
        
        } catch (\Throwable $th) {
            $flasher->addError('Ocorreu um error', 'Erro');
            return back()->withInput();
        }
    }
}
