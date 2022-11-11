@extends('layouts.master', [
    'title' => 'Promotions Manager',
])

@section('body')
    <div class="container py-24">
        <div class="max-w-2xl mx-auto">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg border">
                <div class="text-xl font-semibold mt-4 pl-6"> Promotions </div>
                <div class="p-4 flex justify-between items-center">
                    <div>
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="search-input"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5"
                                placeholder="Recherche de promotions">
                        </div>

                    </div>
                    <div>
                        <a href="{{ route('promotion.create') }}"
                            class="py-2 px-4 bg-blue-600 text-white rounded-full text-xs font-semibold">
                            Ajouter promotion
                        </a>
                    </div>
                </div>
                <div id="promotions">
                    @component('components.promotion.table', [
                        'promotions' => $promotions
                    ])
                    @endcomponent
                </div>
            </div>
            <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $('#search-input').on('input', function() {
        console.log('searching')
        $.ajax({
            url: '{{ route('promotion.search') }}',
            cache: false,
            data: {
                'title': this.value
            },
            success: (data) => {
                $('#promotions').html(data)
            }
        })
    })
</script>
@endsection