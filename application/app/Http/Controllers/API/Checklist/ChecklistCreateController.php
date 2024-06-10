<?php

namespace App\Http\Controllers\API\Checklist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checklist\ChecklistCreateRequest;
use App\Http\Resources\Checklist\ChecklistsResource;
use App\Http\Responses\FailResponse;
use App\Http\Responses\SuccessResponse;
use App\Services\Checklist\ChecklistServiceInterface;
use Illuminate\Http\JsonResponse;

class ChecklistCreateController extends Controller
{
    public function __construct(
        private readonly ChecklistServiceInterface $checklistService,
    )
    {
    }

    public function __invoke(ChecklistCreateRequest $request): JsonResponse
    {
        $checklist = $this->checklistService->create(
            user: auth()->user(),
            data: $request->validated(),
        );

        return $checklist
            ? new SuccessResponse(
                data: ['date' => ChecklistsResource::make($checklist)],
                message: trans('checklist.created', ['name' => $checklist->name])
            )
            : new FailResponse(message: trans('checklist.not_created'));
    }
}
