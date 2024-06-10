<?php

namespace App\Services\Checklist;

use App\Models\Checklist;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ChecklistService implements ChecklistServiceInterface
{
    public function create(User $user, array $data): ?Checklist
    {
        /** @var Checklist $checklist */
        $checklist = null;

        try {
            $checklist = Checklist::query()->create([
                ...$data,
                'user_id' => $user->id,
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return $checklist;
    }
}
