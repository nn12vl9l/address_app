<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Member extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function getImagePathAttribute()
    {
        return 'members/' . $this->image->name;
    }

    public function getImageUrlAttribute()
    {
        return Storage::url($this->image_path);
    }
}
