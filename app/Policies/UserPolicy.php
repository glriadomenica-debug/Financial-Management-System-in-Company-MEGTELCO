<?php
// app/Policies/UserPolicy.php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->isDirector();
    }

    public function create(User $user)
    {
        return $user->isAdmin() || $user->isDirector();
    }

    public function update(User $user, User $model)
    {
        // Apenas admin pode editar outros admins
        if ($model->isAdmin()) {
            return $user->isAdmin();
        }
        return $user->isAdmin() || $user->isDirector();
    }

    public function delete(User $user, User $model)
    {
        // Não pode deletar a si mesmo
        if ($user->id === $model->id) {
            return false;
        }
        
        // Apenas admin pode deletar outros admins
        if ($model->isAdmin()) {
            return $user->isAdmin();
        }
        return $user->isAdmin() || $user->isDirector();
    }
}