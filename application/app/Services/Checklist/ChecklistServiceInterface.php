<?php

namespace App\Services\Checklist;

use App\Models\Checklist;
use App\Models\User;

interface ChecklistServiceInterface
{
    public function create(User $user,array $data): ?Checklist;
}
