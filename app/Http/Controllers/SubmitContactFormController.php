<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\FormSubmission;
use App\Mail\ContactFormSubmissionMail;

class SubmitContactFormController extends Controller
{
    public function __invoke(Request $request){

        /* dd($request->all()); */

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $formSubmission = FormSubmission::create($validated);

        Mail::to('ianbenard2002@gmail.com')->queue(new ContactFormSubmissionMail($formSubmission));


    }
}
