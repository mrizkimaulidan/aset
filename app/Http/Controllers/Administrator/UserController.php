<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Repositories\UserRepository;
use File;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $fileUpload,
        $userRepository;

    public function __construct(FileUploadController $fileUpload, UserRepository $userRepository)
    {
        $this->fileUpload = $fileUpload;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.users.index', [
            'users' => $this->userRepository->getUserOrderBy('name')->get(),
            'roles' => $this->userRepository->getRoleOrderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request, User $user)
    {
        $this->userRepository->store($request);

        return redirect()->route('admin.pengguna.index')->with('success', 'Data pengguna berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('administrator.users.edit', [
            'user' => $this->userRepository->getUserById($id),
            'roles' => $this->userRepository->getRoleOrderBy('name')->get()
        ]);
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
        $this->userRepository->update($request, $id);

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
        $this->userRepository->delete($id);

        return redirect()->route('admin.pengguna.index')->with('success', 'Data pengguna berhasil dihapus!');
    }
}
