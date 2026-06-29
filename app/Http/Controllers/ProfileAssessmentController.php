<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileAssessmentRequest;
use App\Jobs\SyncLeadToFlowin;
use App\Mail\ProfileAssessmentSubmitted;
use App\Models\ProfileAssessment;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class ProfileAssessmentController extends Controller
{
    public function store(ProfileAssessmentRequest $request): JsonResponse
    {
        $assessment = ProfileAssessment::query()->create([
            ...$request->validated(),
            'locale' => app()->getLocale(),
            'submitted_ip' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 255),
        ]);

        Mail::to(config('mail.to.address'), config('mail.to.name'))
            ->send(new ProfileAssessmentSubmitted($assessment));

        SyncLeadToFlowin::dispatch($assessment);

        return response()->json([
            'ok' => true,
            'message' => __('Thank you. Our team will be in touch soon.'),
        ]);
    }
}
