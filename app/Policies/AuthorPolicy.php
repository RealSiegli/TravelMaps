<?php

namespace App\Policies;

use App\Models\User;

class SupportPolicy
{
    public function viewAny(User $user)
    {
        return $user->isAuthor();
    }

    public function view(User $user, Model $model)
    {
        return $user->isAuthor();
    }
}
