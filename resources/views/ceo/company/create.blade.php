<x-guest-layout>
    <form method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
        @csrf

         <!-- image -->
         <div class="mt-4">
            <label for="image">Image</label>
            <input class='block mt-1 w-full' type="file" name="image" id="image">
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>


         <!-- description -->
         <div class="mt-4">
            <label for="description">description</label>
            <input class='block mt-1 w-full' type="text" name="description" id="description">
        </div>

         <!-- phone -->
         <div class="mt-4">
            <label for="phone">phone</label>
            <input class='block mt-1 w-full' type="text" name="phone" id="phone">
        </div>

      
         <!-- phone -->
         <div class="mt-4">
            <label for="adress">adress</label>
            <input class='block mt-1 w-full' type="text" name="adress" id="adress">
        </div>


        <button>save</button>
        
    </form>
</x-guest-layout>
