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
        //first check if the image exists
        if(Storage::disk('s3')->exists('car/'.$this->image_path)) {
            return Storage::disk('s3')->url('car/'.$this->image_path);
        }
        
        //return null by default
        return null;
    }

    public function getImageFromLocal(){
        //first check if the image exists
        if(Storage::disk('local')->exists('car/'.$this->image_path)) {
            return Storage::disk('local')->url('car/'.$this->image_path);
        }

        //return null by default
        return null;
    }
}
