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
                        <a href="{{ route('student.edit', ['student' => $student->token]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-blue-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </a>

                        <a href="{{ route('student.delete', ['student' => $student->token]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </a>

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
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20"
                    fill="currentColor">
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
                    min="1" value="{{ $students->currentPage() }}" id="PaginationPage"
                    disabled />
            </div>

            <span class="h-4 w-px bg-white/25"></span>

            <a href="{{ route('promotion.view', ['promotion' => $promotion->token, 'page' => $page + 1]) }}"
                class="inline-flex h-8 w-8 items-center justify-center {{ $students->currentPage() != $students->lastPage() ?: 'hidden' }}">
                <span class="sr-only">Next Page</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>

    </div>
@endif