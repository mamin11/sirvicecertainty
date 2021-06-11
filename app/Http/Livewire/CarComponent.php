<?php

namespace App\Http\Livewire;

use App\Models\car;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\URL;

class CarComponent extends Component
{
    use WithFileUploads;

    public $image;
    public $name;

    public function upload() {
        //validate
        $this->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:2000'
        ]);
        
        //if the image exists
        if($this->image){
            $imageName = $this->image->getClientOriginalName() .'-'.time().'.'.$this->image->extension();
        }

        //add to DB
        $car = car::create([
            'name' => $this->name,
            'image_path' => $imageName
        ]);
        
        //move image
        $path = $this->image->storeAs('public/cars', $imageName);

        //generate url for uploaded file
        $link = URL::to('/cars/'.$car->id);

        //redirect
        session()->flash('link', $link);
        return redirect()->to(route('home'));
    }

    public function render()
    {
        return view('livewire.car-component');
    }
}
