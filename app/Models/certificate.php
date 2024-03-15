<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'template',
        'student_id',
        'full_name',
        'start_date',
        'end_date',
        'course_code',
        'issue_date',
        'picture',
        'instructor_name',
        'back_text',
    ];
        /**
     * The name of the table associated with the model.
     *
     * @var string
     */
    protected $table = 'certificate';
}
