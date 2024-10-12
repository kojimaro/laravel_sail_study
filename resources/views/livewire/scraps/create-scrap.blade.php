

<div class="w-4/12 rounded shadow-lg bg-white">
    <div class="px-6 py-4 bg-primary text-primary-foreground">
        <h2 class="font-bold text-xl mb-2">Create Scrap</h2>
    </div>

    <form wire:submit="save" class="p-2">
        <div class="px-6 py-4">
            <textarea id="about" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"" wire:model="body"></textarea>
            <div>
                @error('body') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="px-6 pt-4 pb-2">
            <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow mr-2">
                SAVE
            </button>
        </div>
    </form>
</div>

