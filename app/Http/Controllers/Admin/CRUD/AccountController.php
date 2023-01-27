<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class AccountController extends Controller
{
    public static function Routes()
    {
        Route::get('/account', [AccountController::class, 'index'])->name('admin.account.index');
        Route::get('/account-create', [AccountController::class, 'create'])->name('admin.account.create');
        Route::post('/account-store', [AccountController::class, 'store'])->name('admin.account.store');
        Route::get('/account-edit/{id}', [AccountController::class, 'edit'])->name('admin.account.edit');
        Route::put('/account-update/{id}', [AccountController::class, 'update'])->name('admin.account.update');
        Route::get('/account-delete/{id}', [AccountController::class, 'delete'])->name('admin.account.delete');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.components.account.account', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.components.account.addaccount');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'fullname' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $image = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $path_image = 'adm/images/account/';
            if (strcasecmp($extension, 'jpg') === 0 || strcasecmp($extension, 'jepg') === 0 || strcasecmp($extension, 'png') === 0) {
                $name = Str::random(5) . '_' . $name_file;
                while (file_exists($path_image . $name)) {
                    $name = Str::random(5) . '_' . $name_file;
                }
                $file->move($path_image, $name);
                $image = $path_image . $name;
            }
        }
        User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'image' => $image,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.account.index')->with('success', 'Account successfully created');
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
        $roles = Role::all();
        $user = User::find($id);
        return view('admin.components.account.editaccount', compact('user', 'roles'));
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
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'phone_number' => 'required | unique:users,phone_number,' . $id,
            'address' => 'required',
            'email' => 'required | unique:users,email,' . $id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = User::find($id);
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $path_image = 'adm/images/uploads/account/';
            if (strcasecmp($extension, 'jpg') === 0 || strcasecmp($extension, 'jepg') === 0 || strcasecmp($extension, 'png') === 0) {
                $name = Str::random(5) . '_' . $name_file;
                while (file_exists($path_image . $name)) {
                    $name = Str::random(5) . '_' . $name_file;
                }
                $file->move($path_image, $name);
                $image = $path_image . $name;
            }
            if (file_exists($user->image)) {
                File::delete($user->image);
            }
        } else {
            $image = $user->image;
        }

        $user->assignRole($request->role);

        User::find($id)->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'image' => $image,
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.account.index')->with('success', 'Account update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::find($id);
        if ($user->getRoleNames()->first() !== 'admin') {
            $user->removeRole($user->getRoleNames());
            $user->delete();
            return redirect()->back()->with('success', 'account deleted successfully');
        }
        return redirect()->back()->with('error', 'can not delete');
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return;
    }
}
