<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreRegistration extends Model
{
    use HasFactory;
    protected $table = 'pre_registrations'; // Adjust if your table name is different

    // Allow mass assignment for these attributes
    protected $fillable = [
        'programs',
        'first_name',
        'last_name',
        'father_name',
        'email',
        'phone',
        'whatsapp_phone',
        'mailing_address',
        'city',
        'ssc_total_marks',
        'ssc_obtained_marks',
        'hssc_total_marks',
        'hssc_obtained_marks',
        'szabmu_marks',
        'message',
    ];
}
