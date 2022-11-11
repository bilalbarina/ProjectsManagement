@extends('layouts.master', [
    'title' => 'Étudiant',
])

@section('body')
    <div class="container py-10">
        <div class="max-w-2xl mx-auto">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg border">
                <div class="py-6 px-8 flex justify-center flex-col">
                    <div class="mx-auto font-semibold">
                        Mise à jour de tache
                    </div>
                    <form
                        action="{{ route('task.update', [
                            'task' => $task,
                        ]) }}"
                        method="post" class="mt-4 space-y-4">
                        @csrf
                        <input type="text" name="title" placeholder="Title" value="{{ $task->title }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-4 p-2.5">
                        <textarea name="description" placeholder="Description"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-4 p-2.5">{{ $task->description }}</textarea>
                        <div class="flex flex-row justify-between space-x-4">
                            <div class="w-full">
                                <input type="date" name="start_date" placeholder="Début de la tâche" value="{{ $task->start_date?->format('Y-m-d') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-4 p-2.5 w-full uppercase">
                            </div>
                            <div class="w-full">
                                <input type="date" name="end_date" placeholder="Fin de la tâche" value="{{ $task->end_date?->format('Y-m-d') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-4 p-2.5 w-full uppercase">
                            </div>
                        </div>
                        <button type="submit"
                            class="py-2 px-4 bg-blue-600 text-white rounded-full text-xs font-semibold mt-4">
                            Mise à jour
                        </button>
                    </form>
                </div>
            </div>
            <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
        </div>
    </div>
@endsection