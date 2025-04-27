<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Display the contact page
    public function index()
    {
        return view('contact.index');
    }

    // Handle form submission
    public function store(Request $request)
{
    // Validate form data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    // Rename the message variable to avoid conflicts
    $validatedData['userMessage'] = $validatedData['message'];
    unset($validatedData['message']); // Remove the original 'message' to avoid conflicts

    // Send email
    Mail::send('contact.contact', $validatedData, function ($message) use ($validatedData) {
        $message->to('muneebyaqub7@gmail.com') // Replace with the hospital's email
                ->subject('New Inquiry from Contact Form')
                ->from($validatedData['email'], $validatedData['name']);
    });

    return redirect()->back()->with('success', 'Your message has been sent successfully!');
}

}

