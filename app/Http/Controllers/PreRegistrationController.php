<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\PreRegistration;
use Illuminate\Support\Facades\Validator; // Import Validator facade

class PreRegistrationController extends Controller
{
    public function store(Request $request)
    {
        // Define validation rules
        $rules = [
            'programs' => 'required|array',
            'programs.*' => 'in:MBBS,BDS,DPT,BS MLT,BSN,POST RN-BSN',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'fatherName' => 'required|string|max:255',
            'email' => 'required|email|unique:pre_registrations,email',
            'phone' => ['required', 'regex:/^03\d{2}-\d{7}$/'], // For the phone number format
            'W_phone' => ['required', 'regex:/^03\d{2}-\d{7}$/'], // For the WhatsApp number format
            'mailing_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'ssc_total_marks' => 'required|numeric|digits_between:1,5',
            'ssc_obtained_marks' => 'required|numeric|digits_between:1,5',
            'hssc_total_marks' => 'nullable|numeric|digits_between:1,5',
            'hssc_obtained_marks' => 'nullable|numeric|digits_between:1,5',
            'szabmu_marks' => 'nullable|numeric|digits_between:1,5',
            'message' => 'nullable|string|max:3000',
        ];

        // Create a Validator instance and validate the request
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create new pre-registration entry
        PreRegistration::create([
            'programs' => implode(',', $request->input('programs')),
            'first_name' => $request->input('fname'),
            'last_name' => $request->input('lname'),
            'father_name' => $request->input('fatherName'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'whatsapp_phone' => $request->input('W_phone'),
            'mailing_address' => $request->input('mailing_address'),
            'city' => $request->input('city'),
            'ssc_total_marks' => $request->input('ssc_total_marks'),
            'ssc_obtained_marks' => $request->input('ssc_obtained_marks'),
            'hssc_total_marks' => $request->input('hssc_total_marks'),
            'hssc_obtained_marks' => $request->input('hssc_obtained_marks'),
            'szabmu_marks' => $request->input('szabmu_marks'),
            'message' => $request->input('message'),
        ]);

        // Redirect or return a response
        return redirect()->back()->with('success', 'Your registration was successful!');
    }



}
