<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
   // app/Policies/AdminPolicy.php

public function viewAny(User $user)
{
    return $user->isAdmin();
}

public function view(User $user, Model $model)
{
    return $user->isAdmin();
}

}
