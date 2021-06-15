<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Services\CreateCar;
use Illuminate\Http\Request;
use App\Repositories\CarRepository;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    private function manualValidator($request){
        //manual validator
        return $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:2000'
        ]);
    }

    public function getCar($id, CarRepository $carRepository){
        //get a single record from database using $id
        $car = car::where('id',$id)->first();
        $image = $carRepository->getCarImage($car);
        return view('car')->with([
            'car' => $car,
            'image' => $image
        ]);
    }

    public function create(Request $request, CreateCar $createCarService) {
        //validate
        $this->manualValidator($request)->validate();

        //add to DB
        $link = $createCarService->execute($request);

        //redirect
        return redirect()->route('home')->with('link', $link);
    }

    public function api(Request $request, CreateCar $createCarService){
        $validator = $this->manualValidator($request);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        //add to DB
        $link = $createCarService->execute($request);

        return response()->json(['link' => $link], 200);
    }
}
