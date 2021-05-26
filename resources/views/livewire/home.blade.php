<div class="bg-gray-300 text-center my-5">
    <section class="p-5 mb-2">
        <label for="">Country: </label>
        <select name="" id="" class="w-1/5" wire:model="selectedCountry">
            <option selected>select Country</option>
            @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
        </select>
    </section>
    @if(!is_null($selectedCountry) && $states->count()>0)
    <section class="p-5 mb-2">
        <label for="">State: </label>
        <select name="" id="" class="w-1/5" wire:model="selectedState">
            <option selected>select State</option>
            @foreach($states as $state)
                <option value="{{$state->id}}">{{$state->name}}</option>
            @endforeach
        </select>
    </section>
    @endif
    @if(!is_null($selectedState) && $cities->count()>0)
        <section class="p-5 mb-2">
            <label for="">City: </label>
            <select name="" id="" class="w-1/5" wire:model="selectedCity">
                <option selected>select City</option>
                @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </section>
    @endif
</div>
