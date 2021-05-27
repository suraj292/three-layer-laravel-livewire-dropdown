<?php

namespace App\Http\Livewire;

use App\Models\city;
use App\Models\country;
use App\Models\state;
use Livewire\Component;

class Insert extends Component
{
    public $countries, $states, $page,
        $selectedCountry, $selectedState=null,
        $newCountry, $newState, $newCity;

    public function render(){
        return view('livewire.insert');
    }
    public function mount($page='country'){
        $this->page = $page;
        $this->countries = country::all();
    }
    public function addCountry(){
        $countries = country::where('name', '=', $this->newCountry)->value('name');
        if ($countries != $this->newCountry){
            country::create(['name'=>$this->newCountry]);
            session()->flash('country_updated', 'Country has been added.');
        }else{
            session()->flash('country_exist', 'This Country already exist.');
        }
    }
    public function addState(){
        $state = state::where('country_id', '=', $this->selectedCountry)->where('name', '=', $this->newState)->value('name');
        if ($state != $this->newState){
            state::create(['country_id'=>$this->selectedCountry, 'name'=>$this->newState]);
            session()->flash('state_updated', 'State has been added.');
        }else{
            session()->flash('state_exist', 'This State already exist.');
        }
    }
    public function updatedSelectedCountry($selectedCountry){
        $this->states = state::where('country_id', $selectedCountry)->get();
    }
    public function addCity(){
        $city = city::where('state_id', '=', $this->selectedState)->where('name', '=', $this->newCity)->value('name');
        if ($city != $this->newCity){
            city::create(['state_id'=>$this->selectedState, 'name'=>$this->newCity]);
            session()->flash('city_updated', 'City has been added.');
        }else{
            session()->flash('city_exist', 'This City already exist.');
        }
    }
}
