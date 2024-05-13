<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:px-8 lg:py-4  bg-white border-b border-gray-200">
                <h1 class="text-2xl font-medium text-gray-900">
                    {{__('category_add')}}
                </h1>
            </div>
            <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                <form wire:submit="save">
                    <input type="text" wire:model="form.name" class="w-full p-2 border border-gray-300 rounded-lg"
                        placeholder="Category Name">
                    @error('form.name') <span class="text-red-500">{{ $message }}</span> @enderror

                    <select wire:model="form.is_active" class="w-full p-2 border border-gray-300 rounded-lg mt-2">
                        <option value=1>Active</option>
                        <option value=0>Inactive</option>
                    </select>

                    <input type="file" wire:model="form.image"
                        class="w-full p-2 border border-gray-300 rounded-lg mt-2">
                    @error('form.image') <span class="text-red-500">{{ $message }}</span> @enderror

                    <button type="submit" class="w-full p-2 bg-blue-500 text-white rounded-lg mt-2">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>