@extends('layouts.master', [
    'title' => 'Créer un étudiant',
])


@section('body')
    <div class="container py-24">
        <div class="max-w-2xl mx-auto">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg border">
                <div class="py-12 px-8 flex justify-center flex-col">
                    <div class="mx-auto font-semibold">
                        Créer une nouvelle promotion
                    </div>
                    <form action="{{ route('promotion.store') }}" method="post" class="mt-4">
                        @csrf
                        <input type="text" name="title" placeholder="Nom"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-4 p-2.5">
                        <button type="submit"
                            class="py-2 px-4 bg-blue-600 text-white rounded-full text-xs font-semibold mt-4">
                            Créer
                        </button>
                    </form>
                </div>
            @endsection
        </div>
        <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    </div>
</div>
