<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'organization' => 'nullable|string',
            'email' => 'required|email',
            'contact' => 'required|string',
            'query' => 'required|string',
            'department' => 'required|string',
        ]);

        // Department-wise email mapping
        $departmentEmails = [
            'sales' => ['sales@qssindia.in'],
            'support' => ['support@qssindia.in'],
            'accounts' => ['accounts@qssindia.in'],
            'hr' => ['hr@qssindia.in'],
            'IT' => ['ashish.jain@qssindia.in'],
        ];

        $recipients = $departmentEmails[$data['department']] ?? ['info@qssindia.in'];

        Mail::to($recipients)
        ->cc('info@qssindia.in')
        ->send(new ContactFormMail($data));

        return response()->json([
            'message' => 'Your query has been submitted successfully'
        ]);
    }
}
