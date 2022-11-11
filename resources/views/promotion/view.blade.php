@extends('layouts.master', [
    'title' => $promotion->title,
])

@section('body')
    {{-- 'bg-green-600', 'bg-yellow-600', 'bg-orange-600', 'bg-red-600', 'bg-lime-600', 'bg-teal-600', 'bg-cyan-600', 'bg-blue-600', 'bg-indigo-600', 'bg-purple-600', 'bg-pink-600' --}}
    <div class="container py-12">
        <div class="max-w-2xl mx-auto">
            <nav aria-label="Breadcrumb">
                <ol role="list" class="flex items-center gap-1 text-sm text-gray-600">
                    <li>
                        <a href="{{ route('promotion.index') }}" class="block transition hover:text-gray-700">
                            <span class="sr-only"> Home </span>

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </a>
                    </li>

                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </li>

                    <li>
                        <a href="{{ route('promotion.index') }}" class="block transition hover:text-gray-700"> Promotions
                        </a>
                    </li>

                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </li>

                    <li>
                        <a href="{{ url()->current() }}" class="block transition hover:text-gray-700"> {{ $promotion->title }} </a>
                    </li>
                </ol>
            </nav>

            <div class="mt-4 relative overflow-x-auto sm:rounded-lg border py-4 px-6">
                <div class="flex flex-row justify-between">
                    <div id="edit-area" class="hidden">
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-4 p-2.5"
                            value="{{ $promotion->title }}" id="edit-title-input">
                        <span class="text-xs font-semibold text-green-600 hidden" id="update-success">
                            Titre mis à jour avec succès
                        </span>
                    </div>
                    <div class="inline-flex space-x-1 items-center" id="edit-title">
                        <span class="font-semibold">
                            {{ $promotion->title }}
                        </span>
                        <button id="edit-title-button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-4 h-4 text-blue-600">
                                <path
                                    d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                <path
                                    d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                            </svg>
                        </button>
                    </div>
    
                    <div class="mt-4">
                        <span class="text-sm font-semibold"> Apprenants: {{ $students->total() }} </span>
                    </div>
                </div>


                <span class="text-sm pt-4">
                    <span class="font-semibold">Assigned Briefs:</span> <br>
                    <span> {{ $assignedProjects->count() == 0 ? 'No Briefs' : implode(', ', $assignedProjects->all()) }} </span>
                </span>
            </div>
        </div>
        <div class="max-w-2xl mx-auto mt-6">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg border">
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
                                placeholder="Recherche d'apprenants">
                        </div>

                    </div>
                    <div>
                        <a href="{{ route('student.create', ['promotion' => $promotion->token]) }}"
                            class="py-2 px-4 bg-blue-600 text-white rounded-full text-xs font-semibold">
                            Ajouter apprenant
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto px-4 my-6" id="students">
                    @component('components.student.table',
                        [
                            'promotion' => $promotion,
                            'students' => $students,
                            'page' => $page,
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
        $('#edit-title-button').on('click', () => {
            $('#edit-title').hide()
            $('#edit-area').show()
        })

        $('#edit-title-input').on('change', function() {
            $.ajax({
                url: '{{ route('promotion.updateTitle', ['promotion' => $promotion->token]) }}',
                method: 'POST',
                data: {
                    'title': this.value
                },
                success: () => {
                    $('#update-success').show()
                    setTimeout(() => {
                        $('#update-success').hide()
                    }, 2000);
                },
                error: () => alert('Can\'t update title.')
            })
        })

        $('#search-input').on('input', function() {
            console.log('searching')
            $.ajax({
                url: '{{ route('student.search', ['promotion' => $promotion->token]) }}',
                cache: false,
                data: {
                    'name': this.value
                },
                success: (response) => {
                    $('#students').html(response)
                }
            })
        })
    </script>
@endsection
