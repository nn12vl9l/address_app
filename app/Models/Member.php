<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'tel',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function getImagePathAttribute()
    {
        return 'members/' . $this->image[0]->name;
    }

    public function getImageUrlAttribute()
    {
        if (config('filesystems.default') == 'gcs') {
            return Storage::temporaryUrl($this->image_path, now()->addMinutes(5));
        }
        return Storage::url($this->image_path);
    }

    public function getImagePathsAttribute()
    {
        $images = $this->images;
        $paths = [];
        foreach ($images as $image) {
            $paths[] = 'members/' . $image->name;
        }
        return $paths;
    }

    public function getImageUrlsAttribute()
    {
        $image_paths = $this->image_paths;
        $urls = [];
        foreach ($image_paths as $path) {
            $urls[] = Storage::url($path);
        }
        return $urls;
    }
}
