<?php

namespace App\Repositories;

use App\Http\Controllers\Administrator\FileUploadController;
use App\Models\User;
use App\Models\Role;
use File;

class UserRepository
{
    private $fileUploadController;

    public function __construct(FileUploadController $fileUploadController)
    {
        $this->fileUploadController = $fileUploadController;
    }

    public function getUserOrderBy($column, $direction = 'asc')
    {
        return User::with('roles')->orderBy($column, $direction);
    }

    public function getRoleOrderBy($column, $direction = 'asc')
    {
        return Role::orderBy($column, $direction);
    }

    public function store($request)
    {
        $user = new User();
        $user->role_id = $request->role_id;
        $user->unique_user_number = $request->unique_user_number;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->phone_number = $request->phone_number;
        $user->photo = $this->fileUploadController->uploadProfilePicture($request);
        $user->password = bcrypt($request->password);
        $user->save();
    }

    public function getUserById($id)
    {
        return User::findOrFail($id);
    }

    public function update($request, $id)
    {
        $user = User::findOrFail($id);

        if (!empty($request->file('photo'))) {
            if (File::exists(public_path($user->photo))) {
                File::delete(public_path($user->photo));
            }
        }

        if ($request->file('photo') !== null) {
            $user->photo = $this->fileUploadController->uploadProfilePicture($request);
        }

        $user->role_id = $request->role_id;
        $user->unique_user_number = $request->unique_user_number;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->phone_number = $request->phone_number;
        $user->password = $request->password;
        $user->save();
    }

    public function delete($id)
    {
        $user = $this->getUserById($id);

        if (File::exists(public_path($user->photo))) {
            File::delete(public_path($user->photo));
        }

        $user->delete();
    }

    public function updateProfile($request)
    {
        $user = $this->getUserById(auth()->user()->id);

        if ($request->new_password !== null) {
            $user->password = bcrypt($request->new_password);
        }

        if (!empty($request->file('photo'))) {
            if (File::exists(public_path($user->photo))) {
                File::delete(public_path($user->photo));
            }
        }

        if ($request->file('photo') !== null) {
            $user->photo = $this->fileUploadController->uploadProfilePicture($request);
        }

        $user->save();
    }
}
