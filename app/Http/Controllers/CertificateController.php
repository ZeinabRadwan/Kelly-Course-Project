<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\Course;  // Assuming you're using a Course model for course details

class CertificateController extends Controller
{
    public function downloadCertificate()
    {
        $user = auth()->user();  // Get the current logged-in user
        $course = Course::find(1);  // Replace with logic to get the course (e.g., based on the user's completed course)

        // Load the HTML view (it can be your certificate HTML layout)
        $pdf = PDF::loadView('certificates.certificate', compact('user', 'course'));

        // Generate PDF and download it
        return $pdf->download('certificate.pdf');
    }

    public function show(Certificate $certificate)
{
    return view('certificates.show', compact('certificate'));
}

}
