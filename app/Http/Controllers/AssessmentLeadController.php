<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssessmentLeadRequest;
use App\Mail\AssessmentLeadSubmitted;
use App\Models\AssessmentLead;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class AssessmentLeadController extends Controller
{
    public function store(AssessmentLeadRequest $request): JsonResponse
    {
        $lead = AssessmentLead::query()->create([
            ...$request->validated(),
            'locale' => app()->getLocale(),
            'submitted_ip' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 255),
        ]);

        Mail::to(config('mail.to.address'), config('mail.to.name'))
            ->send(new AssessmentLeadSubmitted($lead));

        return response()->json([
            'ok' => true,
            'message' => __('Thank you. Our team will be in touch soon.'),
        ]);
    }
}
