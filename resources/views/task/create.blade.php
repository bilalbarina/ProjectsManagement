@extends('layouts.master', [
    'title' => 'Créer une tache',
])

@section('body')
    <div class="container py-24">
        <div class="max-w-2xl mx-auto">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg border">
                <div class="py-12 px-8 flex justify-center flex-col">
                    <div class="mx-auto font-semibold">
                        Créer des tâches
                    </div>
                    <form action="{{ route('task.store', ['project' => $project]) }}" method="post">
                        @csrf
                        <div id="tasks">
                            <div class="mt-4 space-y-4" task>
                                <input type="text" name="tasks[0][title]" placeholder="Title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-4 p-2.5">
                                <textarea name="tasks[0][description]" placeholder="Description"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-4 p-2.5"></textarea>
                                <div class="flex flex-row justify-between space-x-4">
                                    <div class="w-full">
                                        <input type="date" name="tasks[0][start_date]" placeholder="Début de la tâche"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-4 p-2.5 w-full uppercase">
                                    </div>
                                    <div class="w-full">
                                        <input type="date" name="tasks[0][end_date]" placeholder="Fin de la tâche"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-4 p-2.5 w-full uppercase">
                                    </div>
                                </div>
                                <hr class="border-b border-blue-600 max-w-xs mx-auto">
                            </div>
                        </div>
                        <div class="flex justify-center mt-5">
                            <div class="bg-blue-600 rounded-full p-2 w-10 cursor-pointer" id="add-task">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <button type="submit"
                            class="py-2 px-4 bg-blue-600 text-white rounded-full text-xs font-semibold mt-4">
                            Ajouter
                        </button>
                    </form>
                </div>
            </div>
            <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#add-task').on('click', function() {
            let tasks = $('[task]')
            let lastTaskHtml = tasks.last().prop('outerHTML')
            lastTaskIndex = parseInt(lastTaskHtml.match(/tasks\[([0-9]*)\]/, 'tasks[$1]').at(-1))
            $('#tasks').append(lastTaskHtml.replaceAll(`tasks[${lastTaskIndex}]`, `tasks[${lastTaskIndex + 1}]`))
        });
    </script>
@endsection
