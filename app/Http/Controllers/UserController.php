<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Flasher\Prime\FlasherInterface;
use App\Http\Requests\User\UserRequest;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $users = User::all();
            return DataTables::of($users)
            ->editColumn('created_at', function ($user) {
                return $user->created_at->format('d/m/Y');
            })
            ->editColumn('role', function ($user) {
                return $user->roles->first()->name;
            })
            ->addColumn('actions', 'user.dataTable.action')
            ->rawColumns(['actions'])
            ->make(true);
        }
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $companies = Company::all();
        return view('user.create', ['roles' => $roles, 'companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $userRequest, FlasherInterface $flasher)
    {
        try {
            $user = User::create($userRequest->all());
            $user->companies()->sync($userRequest->input('companies'));
            $user->roles()->attach($userRequest->input('role'));

            $flasher->addSuccess('Usuário adicionado', 'Sucesso');
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            $flasher->addError('Erro ao adicionar usuário', 'Erro');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
