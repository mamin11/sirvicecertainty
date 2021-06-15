<?php
namespace App\Repositories;

use App\Models\car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarRepository {
    public function getCarImage($car){
        $img = '';
        if($this->image('public', $car) !== null){
            $img = 'storage/cars/'.$car->image_path;
        } 
        if($this->image('s3', $car) !== null) {
            $img = $this->image('s3', $car);
        }
        return $img;
    }

    public function create(Request $request, $imageName){
        $car = car::create([
            'name' => $request->name,
            'image_path' => $imageName
        ]);
        return $car;
    }

    private function image($disk, $car){
        if((Storage::disk($disk)->exists('cars/'.$car->image_path))) {
            return Storage::disk($disk)->url('cars/'.$car->image_path);
        } else {
            return null;
        }
    }

}