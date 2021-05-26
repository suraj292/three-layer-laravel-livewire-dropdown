<div>
    <section class="bg-gray-200 p-5 text-center" x-data="{ tab: '' }">
       <div class="border-b-4 border-gray-600 pb-2">
           <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                   :class="{ 'active': tab === 'country' }" @click="tab = 'country'"
           >Add Country</button>
           <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                   :class="{ 'active': tab === 'state' }" @click="tab = 'state'"
           >Add State</button>
           <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                   :class="{ 'active': tab === 'city' }" @click="tab = 'city'"
           >Add City</button>
       </div>

        <div class="bg-gray-200 p-5 text-center" x-show="tab === 'country'">
            @if(session()->has('country_exist'))
                <span class="text-red-500">{{session('country_exist')}}</span><br><br>
            @endif
            @if(session()->has('country_updated'))
                <span class="text-green-500">{{session('country_updated')}}</span><br><br>
            @endif
            <label>Country:
                <input type="text" class="p-2 " placeholder="Enter New Country Name." wire:model.lazy="newCountry">
            </label><br><br>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="addCountry">Save</button>
            <button class="bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">Cancel</button>
        </div>

        <div class="bg-gray-200 p-5 text-center" x-show="tab === 'state'">
            @if(session()->has('state_exist'))
                <span class="text-red-500">{{session('state_exist')}}</span><br><br>
            @endif
            @if(session()->has('state_updated'))
                <span class="text-green-500">{{session('state_updated')}}</span><br><br>
            @endif
            <label>Country:
                <select class="p-2" wire:model="selectedCountry">
                    <option selected>Select Country</option>
                    @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
            </label><br><br>

            @if(!is_null($selectedCountry))
            <label>State:
                <input type="text" class="p-2 " placeholder="Enter New State" wire:model.lazy="newState">
            </label><br><br>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="addState">Save</button>
            @else
                <button class="bg-gray-400 text-white font-bold py-2 px-4 rounded cursor-not-allowed" disabled>Save</button>
            @endif
            <button class="bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">Cancel</button>
        </div>

        <div class="bg-gray-200 p-5 text-center" x-show="tab === 'city'">
            @if(session()->has('city_exist'))
                <span class="text-red-500">{{session('city_exist')}}</span><br><br>
            @endif
            @if(session()->has('city_updated'))
                <span class="text-green-500">{{session('city_updated')}}</span><br><br>
            @endif

            <label>Country:
                <select class="p-2" wire:model="selectedCountry">
                    <option selected>Select Country</option>
                    @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
            </label><br><br>

            @if(!is_null($selectedCountry))
                <label>State:
                    <select class="p-2" wire:model="selectedState">
                        <option selected>Select State</option>
                        @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                </label><br><br>
            @endif

            @if(!is_null($selectedState))
                <label>City:
                    <input type="text" class="p-2 " placeholder="Enter New State." wire:model="newCity">
                </label><br><br>
            @endif

            @if(!is_null($selectedState))
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="addCity">Save</button>
            @else
                <button class="bg-gray-400 text-white font-bold py-2 px-4 rounded cursor-not-allowed" disabled>Save</button>
            @endif
            <button class="bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">Cancel</button>
        </div>

    </section>
</div>
