<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;
use App\Mail\ThankYouForContact;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('User.Contact.contact-us'); // Ensure this view matches the path to your contact form blade file
    }

    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $contactMessage = ContactMessage::create($validated);

        // Send email
        Mail::to('ulomijay160@gmail.com.com')->send(new ContactFormSubmitted($contactMessage));

        Mail::to($contactMessage->email)->send(new ThankYouForContact($contactMessage));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}

