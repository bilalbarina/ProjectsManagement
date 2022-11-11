@extends('layouts.master', [
    'title' => 'Créer un étudiant',
])

@section('body')
    <div class="container py-24">
        <div class="max-w-2xl mx-auto">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg border">
                <div class="py-12 px-8 flex justify-center flex-col">
                    <div class="mx-auto font-semibold">
                        Créer un étudiant
                    </div>
                    <form action="{{ route('student.store', ['promotion' => $promotion->token]) }}" method="post"
                        class="mt-4 space-y-4">
                        @csrf
                        <div class="flex flex-row justify-between space-x-4">
                            <div class="w-full">
                                <input type="text" name="first_name" placeholder="Prénom"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-4 p-2.5 w-full">
                            </div>
                            <div class="w-full">
                                <input type="text" name="last_name" placeholder="Nom"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-4 p-2.5 w-full">
                            </div>
                        </div>

                        <input type="email" name="email" placeholder="E-mail"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-4 p-2.5">
                        <button type="submit"
                            class="py-2 px-4 bg-blue-600 text-white rounded-full text-xs font-semibold mt-4">
                            Créer
                        </button>
                    </form>
                </div>
            </div>
            <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
        </div>
    </div>
@endsection
