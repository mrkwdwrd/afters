<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnquiryRequest;
use App\Mail\EnquirySubmitted;
use App\Rules\GoogleRecaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Validator;

class ContactController extends BaseController
{
    /**
     * Send enquiry email.
     *
     * @param EnquiryRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendEnquiry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'                 => 'required',
            'email'                => 'required|email',
            'message'              => 'required',
            'g-recaptcha-response' => ['required', new GoogleRecaptcha],
        ], [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please enter a valid email address',
            'message.required' => 'Please enter your contact message',
            'g-recaptcha-response.required' => 'Please confirm that you are not a robot',
            'g-recaptcha-response' => 'Please confirm that you are not a robot'
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        try {
            Mail::to(config('sitesettings.enquiry_emails'))
                ->send(new EnquirySubmitted($request->all()));
        } catch (\Exception $e) {
            Log::error('Send Enquiry Email Error - ', [$e->getMessage()]);

            return back()->with(['error' => trans('messages.internal_error')]);
        }

        return back()->with(['success' => trans('messages.enquiry_submitted')]);
    }
}
