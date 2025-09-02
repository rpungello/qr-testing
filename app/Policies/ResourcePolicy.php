<?php

namespace App\Policies;

use App\Models\Resource;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResourcePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Resource $resource): bool
    {
        return $user->can('view', $resource->project);
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Resource $resource): bool
    {
        return $this->view($user, $resource);
    }

    public function delete(User $user, Resource $resource): bool
    {
        return $this->update($user, $resource);
    }

    public function restore(User $user, Resource $resource): bool
    {
        return $this->delete($user, $resource);
    }

    public function forceDelete(User $user, Resource $resource): bool
    {
        return $this->delete($user, $resource);
    }
}
