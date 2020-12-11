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
                <x-jet-label for="color" value="{{ __('Color') }}" />
                <x-jet-input id="color" class="block mt-1 w-full" type="text" name="color" :value="old('color')"  />
            </div>
            
            <div class="mt-4">
                <x-jet-label for="warranty" value="{{ __('Warranty') }}" />
                <x-jet-input id="warranty" class="block mt-1 w-full" type="text" name="warranty" :value="old('warranty')"  />
            </div>
            <div class="mt-4">
                <x-jet-label for="discount" value="{{ __('Discount in percents. FIX:No % sign needed') }}" />
                <x-jet-input id="discount" class="block mt-1 w-mid" type="text" name="discount" :value="old('discount')"  />
            </div>
            <div class="mt-4">
                <x-jet-label for="category" value="{{ __('Category') }}" />
                <x-jet-input id="category" class="block mt-1 w-mid" type="text" name="category" :value="old('category')"  />
            </div>
            <div class="mt-4">
                <x-jet-label for="manufacturer" value="{{ __('Manufacturer') }}" />
                <x-jet-input id="manufacturer" class="block mt-1 w-mid" type="text" name="manufacturer" :value="old('manufacturer')"  />
            </div>
            
       




            {{-- <div class="mt-4">
                <x-jet-label for="description" value="{{ __('Description') }}" />

                <textarea class="block mt-1 w-full" id="description" name="description" rows="8"  cols="54" ></textarea>
             
            </div> --}}
        
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
