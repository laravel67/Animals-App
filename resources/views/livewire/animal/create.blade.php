<div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden md:w-1/2">
    <form class="p-6 space-y-6" wire:submit="{{ $isEditing ? 'update':'store' }}">
        <h1 class="text-center">
            @if ($isEditing)
            Update {{ $name }}
            @else
            Create New Animal
            @endif
        </h1>
        <div class="grid grid-cols-1 gap-6">
            {{-- Name --}}
            <div>
                <div class="relative">
                    <input type="text" id="name" wire:model='name'
                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 @error('name')
                            border-red-600 
                        @enderror appearance-none dark:text-white focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " />
                    <label for="name"
                        class="absolute text-sm dark:text-green-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Animal
                        name <span class="text-red-500">*</span></label>
                </div>
                @error('name')
                <p id="name" class="mt-2 text-xs text-red-600 dark:text-green-400">
                    <span class="font-medium">
                        opps!</span> {{ $message }}
                </p>
                @enderror
            </div>
            {{-- End Name --}}
            {{-- spesies --}}
            <div>
                <div class="relative">
                    <select type="text" id="spesies_id" wire:model='spesies_id'
                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 @error('spesies_id')
                                        border-red-600 
                                    @enderror appearance-none dark:text-white focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" ">
                        <option class="text-white">Pilih Spesies</option>
                        @forelse ($spesies as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @empty
                        <option>Spesies Tidak ada</option>
                        @endforelse
                    </select>
                    <label for="spesies_id"
                        class="absolute text-sm dark:text-green-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Spesies
                        <span class="text-red-500">*</span></label>
                </div>
                @error('spesies_id')
                <p id="spesies_id" class="mt-2 text-xs text-red-600 dark:text-green-400">
                    <span class="font-medium">
                        opps!</span> {{ $message }}
                </p>
                @enderror
            </div>
            {{-- End Spesies --}}
            {{-- Food --}}
            <div>
                <div class="relative">
                    <input type="text" id="food" wire:model='food'
                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 @error('food')
                                        border-red-600 
                                    @enderror appearance-none dark:text-white focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " />
                    <label for="food"
                        class="absolute text-sm dark:text-green-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Food
                        <span class="text-red-500">*</span></label>
                </div>
                @error('food')
                <p id="food" class="mt-2 text-xs text-red-600 dark:text-green-400">
                    <span class="font-medium">
                        opps!</span> {{ $message }}
                </p>
                @enderror
            </div>
            {{-- End Food --}}
            {{-- Habitat --}}
            <div>
                <div class="relative">
                    <input type="text" id="habitat" wire:model='habitat'
                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 @error('habitat')
                                                    border-red-600 
                                                @enderror appearance-none dark:text-white focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        placeholder=" " />
                    <label for="habitat"
                        class="absolute text-sm dark:text-green-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Habitat
                        <span class="text-red-500">*</span></label>
                </div>
                @error('habitat')
                <p id="habitat" class="mt-2 text-xs text-red-600 dark:text-green-400">
                    <span class="font-medium">
                        opps!</span> {{ $message }}
                </p>
                @enderror
            </div>
            {{-- End Habitat --}}
            {{-- Description --}}
            <div>
                <div class="relative">
                    <textarea id="description" wire:model='description'
                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 @error('description')
                                                    border-red-600 
                                                @enderror appearance-none dark:text-white focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        placeholder=" "></textarea>
                    <label for="description"
                        class="absolute text-sm dark:text-green-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Description</label>
                </div>
                @error('description')
                <p id="description" class="mt-2 text-xs text-red-600 dark:text-green-400">
                    <span class="font-medium">
                        opps!</span> {{ $message }}
                </p>
                @enderror
            </div>
            {{-- End Description --}}
            {{-- Image --}}
            <div>
                <div class="relative">
                    <input type="file" id="image" wire:model='image'
                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 @error('image')
                                                    border-red-600 
                                                @enderror appearance-none dark:text-white focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        placeholder=" " />
                    <label for="image"
                        class="absolute text-sm dark:text-green-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Gambar/Foto</label>
                    @if (!$isEditing && $image)
                    <img src="{{ $image->temporaryUrl() }}" width="200">
                    @elseif ($isEditing)
                    @if ($image)
                    <img src="{{ is_string($image) ? $oldImage :  $image->temporaryUrl() }}" width="200">
                    @elseif($isEditing)
                    <img src="{{ $oldImage }}" width="200">
                    @endif
                    @endif
                </div>
                @error('image')
                <p id="image" class="mt-2 text-xs text-red-600 dark:text-green-400">
                    <span class="font-medium">
                        opps!</span> {{ $message }}
                </p>
                @enderror
            </div>
            {{-- End Image --}}
        </div>
        <div class="flex w-full justify-end">
            <button type="button" wire:click='cancel'
                class="border-red-600 border text-red-600 rounded-md px-4 py-2 mr-1 hover:bg-red-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Cancel
            </button>
            <button type="submit"
                class=" bg-blue-600 text-white rounded-md px-4 py-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                @if ($isEditing)
                Update
                @else
                Create
                @endif
            </button>
        </div>
    </form>
</div>