<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\CarRepository;
use Illuminate\Support\Facades\URL;


class CreateCar {
    private $carRepository;

    public function __construct(CarRepository $carRepository){
        $this->carRepository = $carRepository;
    }
    public function execute(Request $request) {
        //generate new name
        $imageName = $this->generateNewFileName($request->image->getClientOriginalName(), $request->image->extension());

        //create record
        $car = $this->carRepository->create($request, $imageName);

        //move image
        $this->moveImage($request, $imageName);

        //generate url for uploaded file
        $link = $this->generateLink($car->id);
        return $link;
    }

    private function generateNewFileName($original, $extension){
        //generates a new file name based on original name 
        $imageName = $original .'-'.time().'.'.$extension;
        return $imageName;
    }

    private function moveImage($request, $imageName){
        //moves the image to local storage
        $path = $request->file('image')->storeAs('public/cars', $imageName);
    }
    
    private function generateLink($id){
        //generates link for the newly generated record
        $link = URL::to('/cars/'.$id);
        return $link;
    }
}
