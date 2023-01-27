<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public static function Routes() {
        Route::get('/role', [RoleController::class,'index'])->name('admin.role.index');
        // Route::get('role/create', [RoleController::class,'create'])->name('admin.role.create');
        Route::post('/role/store', [RoleController::class,'store'])->name('admin.role.store');
        Route::get('/role/edit/{id}', [RoleController::class,'edit'])->name('admin.role.edit');
        Route::put('/role/update/{id}', [RoleController::class,'update'])->name('admin.role.update');
        Route::delete('/role-delete/{id}', [RoleController::class,'delete'])->name('admin.role.delete');
    }

    public function index() {
        $roles = Role::all();
        return view('admin.components.role.role', compact('roles'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required | unique:roles',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        $role->givePermissionTo(Permission::where([
            ['name', '<>', 'fee.add'],
            ['name', '<>', 'fee.edit'],
            ['name', '<>', 'fee.del'],
            ['name', '<>', 'log.view'],
            ['name', '<>', 'cus.add'],
            ['name', '<>', 'cus.edit'],
            ['name', '<>', 'cus.del'],
            ['name', 'not like', 'sys%'],
        ])->get());

        return redirect()->back()->with('success', 'successfully created');
    }

    public function edit(Request $request, $id) {

        return view('admin.components.role.editrole');
    }

    public function delete(Request $request, $id) {

        $role = Role::find($id);
        dd($role);
        return redirect()->back()->with('success', 'successfully deleted');
    }
}
