<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Category;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Requests\Category\CreateCategoryRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Ver Categorias')->only('index');
        $this->middleware('can:Criar Categorias')->only('create', 'story');
        $this->middleware('can:Editar Categorias')->only('edit', 'update');
        $this->middleware('can:Deletar Categorias')->only('delete');
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $categories = Category::select('categories.*');
            return DataTables::of($categories)
            ->editColumn('company_id', function ($category) {
                return $category->company->name;
            })
            ->editColumn('status', function ($category) {
                return $category->status ? '<span class="badge bg-success">Ativa</span>' : '<span class="badge bg-warning">Inativa</span>';
            })
            ->addColumn('actions', 'category.dataTable.action')
            ->rawColumns(['actions', 'status'])
            ->make(true);
        }
        return view('category.index');
    }

    public function create()
    {
        $companies = Company::all();
        return view('category.create',[
            'companies' => $companies
        ]);
    }

    public function store(CreateCategoryRequest $CategoryRequest,  FlasherInterface $flasher)
    {
        $status = 0;

        if($CategoryRequest->input('status')){
            $status = 1;
        }

        try {
            Category::create([
                'name' => $CategoryRequest->input('name'),
                'description' => $CategoryRequest->input('description'),
                'company_id' => $CategoryRequest->input('company_id'),
                'status' => $status
            ]);
            $flasher->addSuccess('Nova categoria criada', 'Sucesso');

            return redirect()->route('categories.index');

        } catch (\Throwable $th) {
            $flasher->addError('Ocorreu um error', 'Erro');
            return back()->withInput();
        }
    }

    public function edit(Category $category)
    {
        $companies = Company::all();
        return view('category.edit', ['category' => $category, 'companies' => $companies]);
    }

    public function update(UpdateCategoryRequest $request, Category $category, FlasherInterface $flasher)
    {
        $status = 0;

        if($request->input('status')){
            $status = 1;
        }

        $category->update([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
            'status' => $status
        ]);

        $flasher->addSuccess('Categoria atualizada', 'Sucesso');

        return redirect()->route('categories.edit', ['category' => $category->id]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['success' => 'sucesso']);
    }
}
