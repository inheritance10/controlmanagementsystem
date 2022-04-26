<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    use HasFactory;

    protected $fillable = ['slider_title',
        'slider_slug','slider_url','slider_content','slider_status',
        'slider_file'
        ];
}
