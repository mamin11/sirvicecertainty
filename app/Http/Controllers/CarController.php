<?php

namespace App\Http\Controllers;

use App\Models\car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function create(Request $request) {
        //validate
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:2000'
        ]);
        $imageName = $request->image->getClientOriginalName() .'-'.time().'.'.$request->image->extension();
        //add to DB
        $car = car::create([
            'name' => $request->name,
            'image_path' => $imageName
        ]);
        
        //move image
        $path = $request->file('image')->storeAs('public/cars', $imageName);

        //generate url for uploaded file
        $link = URL::to('/cars/'.$car->id);

        //redirect
        return redirect()->route('home')->with('link', $link);
    }

    public function getCar($id){
        //get a single record from database using $id
        $car = car::where('id',$id)->first();
        return view('car')->with('car', $car);
    }

    public function livewire(){
        return view('livewire');
    }

    public function vue(){
        return view('vue');
    }

    public function api(Request $request){
        //manual validator
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:2000'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        //create the record
        //add to DB
        $imageName = $request->image->getClientOriginalName() .'-'.time().'.'.$request->image->extension();
        $car = car::create([
            'name' => $request->name,
            'image_path' => $imageName
        ]);
        
        //move image
        $path = $request->file('image')->storeAs('public/cars', $imageName);

        //generate url for uploaded file
        $link = URL::to('/cars/'.$car->id);

        return response()->json(['link' => $link], 200);
    }
}
