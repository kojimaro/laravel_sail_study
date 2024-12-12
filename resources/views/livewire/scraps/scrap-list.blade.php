<div>
    <div class="flex justify-center mb-10">
        <livewire:scraps.create-scrap />
    </div>

    @if(!is_null($scrap))
        <div class="flex justify-center mb-10">
            <!-- 特定のscrapをクリックしたのち別のscrapの内容を表示するには -->
            <!-- ユニークな:keyを指定しないと切り替えが起きない -->
            <livewire:scraps.edit-scrap :key="$scrap->id" :scrap="$scrap" />
        </div>
    @endif

    <div class="grid grid-cols-4 gap-4 mb-6">
        @foreach ($scraps as $scrap)
            <div
                wire:key="{{ $scrap->id }}"
                class="rounded shadow-lg bg-white px-4">
                <div class="my-3 pl-2.5">
                    {{ $scrap->body }}
                </div>
                <hr>
                <div>
                    <button
                        wire:click="editScrap({{$scrap->id}})"

                        type="button"
                        class="text-gray-900 bg-white font-medium text-sm p-2.5 me-2 hover:text-sky-500">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                        </svg>
                    </button>

                    <button
                        wire:click="deleteScrap({{$scrap->id}})"

                        type="button"
                        class="text-gray-900 bg-white font-medium text-sm p-2.5 me-2 hover:text-sky-500">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <div>
        {{-- $scraps->links() --}}
    </div>
</div>
