<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getUserOrderBy($column, $direction = 'asc')
    {
        return User::with('roles')->orderBy($column, $direction);
    }
}
