<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class car extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image_path'];

    public function getImageFroms3(){
        return Storage::disk('s3')->url('car/'.$this->image_path);
    }
}
