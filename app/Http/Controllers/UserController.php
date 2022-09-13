<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Flasher\Prime\FlasherInterface;
use App\Http\Requests\User\UserRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\User\UpdateRequest;

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
    public function edit(User $user)
    {
        $companies = Company::all('id', 'name');
        $roles = Role::all('id', 'name');
        return view('user.edit', [
            'user' => $user,
            'companies' => $companies,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $updateRequest, User $user, FlasherInterface $flasher)
    {
        DB::beginTransaction();
        try {
            $user->update([
                'name' => $updateRequest->input('name'),
                'email' => $updateRequest->input('email')
            ]);
            $user->companies()->sync($updateRequest->input('companies'));
            $user->roles()->sync($updateRequest->input('role'));

            $flasher->addSuccess('Informações alteradas', 'Sucesso');
            DB::commit();

            return redirect()->route('users.edit', ['user' => $user->id]);
        } catch (\Throwable $th) {
            DB::rollBack();
            $flasher->addError('Erro ao tentar alterar as informações', 'Erro');

            return redirect()->back();
        }
    }

    public function changePassword(UpdatePasswordRequest $request, User $user, FlasherInterface $flasher)
    {
        try {
            $user->update([
                'password' => $request->input('password')
            ]);

            $flasher->addSuccess('Senha alterada', 'Sucesso');
            return redirect()->route('users.edit', ['user' => $user->id]);
        } catch (\Throwable $th) {
            $flasher->addError('Error ao alterar senha', 'Erro');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, FlasherInterface $flasher)
    {
       $user->delete();

       return response()->json(['success' => 'sucesso']);
    }
}
