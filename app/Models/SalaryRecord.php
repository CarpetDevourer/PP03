<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id',
        'applicant_name',
        'position',
        'hours_worked',
        'salary_jan',
        'salary_feb',
    ];

    public function request()
    {
        return $this->belongsTo(ArchiveRequest::class);
    }
}
