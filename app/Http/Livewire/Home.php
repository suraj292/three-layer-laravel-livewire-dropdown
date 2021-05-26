<?php

namespace App\Http\Livewire;

use App\Models\city;
use App\Models\country;
use App\Models\state;
use Livewire\Component;

class Home extends Component
{
    public $countries, $states, $cities;
    public $selectedCountry=NULL,$selectedState=NULL,$selectedCity;
    public function render()
    {
        return view('livewire.home');
    }
    public function mount(){
        $this->countries = country::all();
    }
    public function updatedSelectedCountry($selectedCountry){
        $this->states = state::where('country_id', $selectedCountry)->get();
        $this->selectedState = NULL;
    }
    public function updatedSelectedState($selectedState){
        $this->cities = city::where('state_id',$selectedState)->get();
    }

}
