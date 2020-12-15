<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use File;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $fileUpload;

    public function __construct(FileUploadController $fileUpload)
    {
        $this->fileUpload = $fileUpload;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->orderBy('name', 'asc')->get();
        $roles = Role::orderBy('name', 'asc')->get();

        return view('administrator.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request, User $user)
    {
        $user = new User();
        $user->role_id = $request->role_id;
        $user->unique_user_number = $request->unique_user_number;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->phone_number = $request->phone_number;
        $user->photo = $this->fileUpload->uploadProfilePicture($request);
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('admin.pengguna.index')->with('success', 'Data pengguna berhasil ditambahkan!');
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
        $user = User::findOrFail($id);
        $roles = Role::orderBy('name', 'asc')->get();

        return view('administrator.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if (!empty($request->file('photo'))) {
            if (File::exists(public_path($user->photo))) {
                File::delete(public_path($user->photo));
            }
        }

        if ($request->file('photo') !== null) {
            $user->photo = $this->fileUpload->uploadProfilePicture($request);
        }

        $user->role_id = $request->role_id;
        $user->unique_user_number = $request->unique_user_number;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->phone_number = $request->phone_number;
        $user->password = $request->password;
        $user->save();

        return redirect()->route('admin.pengguna.edit', $id)->with('success', 'Data pengguna berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (File::exists(public_path($user->photo))) {
            File::delete(public_path($user->photo));
        }

        $user->delete();

        return redirect()->route('admin.pengguna.index')->with('success', 'Data pengguna berhasil dihapus!');
    }
}
