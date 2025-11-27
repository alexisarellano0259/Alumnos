<?php

namespace App\Policies;

use App\Models\Tarea;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TareaPolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $user)
    {
        // cualquiera (incluido guest) puede ver listados
        return true;
    }

    public function view(?User $user, Tarea $tarea)
    {
        // cualquiera puede ver un detalle
        return true;
    }

    public function create(User $user)
    {
        // cualquier usuario autenticado puede crear una tarea
        return $user !== null;
    }

    public function update(User $user, Tarea $tarea)
    {
        return $user->id === $tarea->user_id;
    }

    public function delete(User $user, Tarea $tarea)
    {
        return $user->id === $tarea->user_id;
    }
}
