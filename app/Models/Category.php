<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['cat_name', 'cat_desription', 'is_featured', 'cover_image', 'thumbnail'];
    use HasFactory;
}
