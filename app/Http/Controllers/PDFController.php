<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        try {
            // Get the user data from the request payload
            $user = $request->user;

            // Ensure $user is not empty
            if (!$user) {
                throw new \Exception('User data not found.');
            }

            // Pass the user data to the view
            $pdf = PDF::loadView('user', compact('user'));
            
            // Download the PDF
            return $pdf->download('user_details.pdf');
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            // For now, just return a response indicating failure
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}