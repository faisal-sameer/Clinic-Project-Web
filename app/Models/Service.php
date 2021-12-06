<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function ClinicInfo()
    {
        return $this->hasOne(clinic::class, 'id', 'clinic_id');
    }
    public function emp()
    {
        return $this->hasOne(User::class, 'id', 'employee_id');
    }
}
