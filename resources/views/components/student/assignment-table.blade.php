<table class="w-full">
    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
        <tr>
            <th class="p-2 whitespace-nowrap">
                <div class="font-semibold text-left"> Nom </div>
            </th>
            <th class="p-2 whitespace-nowrap">
                <div class="font-semibold text-left"> E-mail </div>
            </th>
            <th class="p-2 whitespace-nowrap">
                <div class="font-semibold text-center"> Options </div>
            </th>
        </tr>
    </thead>
    <tbody class="text-sm divide-y divide-gray-100 px-8">
        @foreach ($students as $student)
            <tr class="p-10">
                <td class="p-2 whitespace-nowrap">
                    <div class="flex items-center space-x-2">
                        <div
                            class="w-10 h-10 font-semibold rounded-full flex-shrink-0 flex justify-center items-center text-white {{ $student->photo_color }}">
                            {{ strtoupper(substr($student->first_name, 0, 1)) }}
                        </div>
                        <div class="font-medium text-gray-800">
                            {{ ucwords($student->first_name . ' ' . $student->last_name) }}
                        </div>
                    </div>
                </td>
                <td class="p-2 whitespace-nowrap">
                    <div class="text-left">{{ $student->email }} </div>
                </td>
                <td class="p-2 whitespace-nowrap">
                    <div class="flex justify-center space-x-2">
                        @if ($project->students->contains($student->id))
                            <a href="{{ route('assignment.unassign', ['project' => $project, 'student_id' => $student->id]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                  </svg>
                            </a>
                        @else
                            <a href="{{ route('assignment.assign', ['project' => $project, 'student_id' => $student->id]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-green-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@if ($students->total() > 5)
    <div class="w-full flex justify-center mt-6">
        <div class="inline-flex items-center justify-center rounded bg-blue-600 py-1 text-white">
            <a href="{{ route('promotion.view', ['promotion' => $promotion->token, 'page' => $page - 1]) }}"
                class="inline-flex h-8 w-8 items-center justify-center {{ $page != 1 ?: 'hidden' }}">
                <span class="sr-only">Prev Page</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            <span class="h-4 w-px bg-white/25" aria-hidden="true"></span>

            <div>
                <label for="PaginationPage" class="sr-only">Page</label>

                <input type="number"
                    class="h-8 w-12 rounded border-none bg-transparent p-0 text-center text-xs font-medium [-moz-appearance:_textfield] focus:outline-none focus:ring-inset focus:ring-white [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none"
                    min="1" value="{{ $students->currentPage() }}" id="PaginationPage" disabled />
            </div>

            <span class="h-4 w-px bg-white/25"></span>

            <a href="{{ route('promotion.view', ['promotion' => $promotion->token, 'page' => $page + 1]) }}"
                class="inline-flex h-8 w-8 items-center justify-center {{ $students->currentPage() != $students->lastPage() ?: 'hidden' }}">
                <span class="sr-only">Next Page</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>

    </div>
@endif
