<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

use App\Thing;

class ThingPolicy
{
    use HandlesAuthorization;

    
    public function update(User $user, Thing $thing)
    {
        return $user->id === $thing->author_id;
    }
    
    public function delete(User $user, Thing $thing)
    {
        return $user->id === $thing->author_id;
    }
}
