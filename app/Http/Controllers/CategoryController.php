<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Category\CategoryRequest;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $categories = Category::select('categories.*');
            return DataTables::of($categories)
            ->editColumn('created_at', function ($category) {
                return $category->created_at->format('d/m/Y');
            })
            ->editColumn('status', function ($category) {
                return $category->status ? 'ATIVA' : 'INATIVA'; 
            })
            ->addColumn('actions', 'category.action')
            ->rawColumns(['actions'])
            ->make(true); 
        }
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

            return redirect()->route('category.index');
        
        } catch (\Throwable $th) {
            $flasher->addError('Ocorreu um error', 'Erro');
            return back()->withInput();
        }
    }

    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category, FlasherInterface $flasher)
    {
        $status = 0;
        
        if($request->input('status')){
            $status = 1;
        }

        $category->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $status
        ]);

        $flasher->addSuccess('Categoria atualizada', 'Sucesso');

        return back();
    }
}
