<x-guest-layout>
    <x-jet-authentication-card>
        <style>
            h1{
                font-size: 100px;
            }
            a{
                color:blue;
                text-decoration: underline;
            }
        </style>
        
        <x-slot name="logo">
            <h1>Prekės pridėjimas</h1>
        </x-slot>

       
        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('item.store') }}"  enctype="multipart/form-data">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  />
            </div>
            <div>
                <x-jet-label for="price" value="{{ __('Price') }}" />
                <x-jet-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" />
            </div>

            <div class="mt-4">
                <x-jet-label for="quantity" value="{{ __('Quantity') }}" />
                <x-jet-input id="quantity" class="block mt-1 w-full" type="text" name="quantity" :value="old('quantity')"  />
            </div>


            <div class="mt-4">
                <x-jet-label for="description" value="{{ __('Description') }}" />

                <textarea class="block mt-1 w-full" id="description" name="description" rows="8"  cols="54" ></textarea>
             
            </div>
        
            <div class="mt-4">
                <x-jet-label for="description" value="{{ __('Nuotruakos') }}" />

           
                <input type="file" name="photos[]" multiple>
              
            </div>
      

                <x-jet-button class="ml-4">
                    {{ __('Įrašyti prekę') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
