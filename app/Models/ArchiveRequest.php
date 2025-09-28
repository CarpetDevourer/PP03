<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchiveRequest extends Model
{
    use HasFactory;

    protected $table = 'archive_cases';

    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'organization',
        'position',
        'start_date',
        'end_date',
        'comment',
    ];
}
