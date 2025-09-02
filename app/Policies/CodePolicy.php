<?php

namespace App\Policies;

use App\Models\Code;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CodePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Code $code): bool
    {
        return $user->can('view', $code->resource);
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Code $code): bool
    {
        return $this->view($user, $code);
    }

    public function delete(User $user, Code $code): bool
    {
        return $this->update($user, $code);
    }

    public function restore(User $user, Code $code): bool
    {
        return $this->delete($user, $code);
    }

    public function forceDelete(User $user, Code $code): bool
    {
        return $this->delete($user, $code);
    }
}
