<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGenerate extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'keyword',
        'status',
        'prompt',
        'file_name',
        'src',
        'response',
    ];
}
