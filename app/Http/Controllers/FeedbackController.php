<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    use HelperTrait;

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function sendRequest(Request $request): JsonResponse|RedirectResponse
    {
        return $this->sendMessage('feedback', $this->validate($request, $this->getRequestValidation()), $request);
    }

    public function sendMessage($template, array $fields, Request $request): JsonResponse|RedirectResponse
    {
        Mail::send('emails.'.$template, $fields, function($message) {
            $message->subject('Сообщение с сайта '.env('APP_NAME'));
            $message->to(env('MAIL_TO'));
        });
        $message = trans('content.we_will_contact_you');
        return $request->ajax()
            ? response()->json(['success' => true, 'message' => $message])
            : redirect()->back()->with('message', $message);
    }
}
