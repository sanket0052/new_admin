<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Yajra\Datatables\Datatables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.index');
    }

    public function getData()
    {
        $roles = Role::with('user')->get();

        return Datatables::of($roles)
            ->addColumn('created_by', function ($role) {
                return $role->user->name;
            })
            ->addColumn('action', function ($role) {
                return view('admin.shared.datatable.action', [
                    'editUrl' => route('admin.role.edit', $role->id),
                    'deleteUrl' => route('admin.role.destroy', $role->id),
                ])->render();
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.form', [
            'role' => null,
            'route' => 'admin.role.store',
            'method' => 'POST'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $inputs = $request->all();

        $role = Role::create($inputs);

        return redirect('admin/role')
            ->with('message', 'Role Created Successfully.');
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
        $role = Role::findOrFail($id);

        return view('admin.role.form', [
            'role' => $role,
            'route' => ['admin.role.update', $role->id],
            'method' => 'PUT',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $inputs = $request->all();

        $role = Role::findOrFail($id);

        $role->fill($inputs)->save();

        return redirect('admin/role')
            ->with('message', 'Role Update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect('admin/role')->with('message', 'Role Deleted Successfully.');
    }
}
