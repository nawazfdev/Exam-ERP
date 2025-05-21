<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\ConsultationFormMail;
use Illuminate\Http\Request;

class ConsultationFormController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'projectname' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        // Prepare email data
        $data = [
            'projectname' => $request->projectname,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];

        // Send the email (replace with your desired email address)
        try {
            Mail::to('ishafaqkhan188@gmail.com')->send(new ConsultationFormMail($data));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while sending the email.');
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Thank you for your message! We will contact you soon.');
    }
}
