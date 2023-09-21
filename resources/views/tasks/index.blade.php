<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex items-center justify-end">
                        <a href="{{route('person.create')}}" class="bg-gray-500 text-white py-2 px-3 rounded-full"> Add Person </a>
                    </div>

                    <table class="table-fixed border-separate border-spacing-6">
                        <thead>
                            <tr>
                                <th>Task Title</th>
                                <th>For</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($tasks as $task)
                            <tr>
                                <td> {{ __($task->title) }} </td>
                                <td>
                                    @if($task->taskable instanceof \App\Models\Person)
                                        <svg style="display: inline;" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                        </svg>
                                        {{ $task->taskable->first_name }} {{ $task->taskable->last_name }}
                                    @else
                                        <svg style="display: inline;" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15V9m4 6V9m4 6V9m4 6V9M2 16h16M1 19h18M2 7v1h16V7l-8-6-8 6Z"/>
                                        </svg>
                                        {{ $task->taskable->business_name }}
                                    @endif
                                </td>
                                <td> {{ __($task->status) }} </td>
                                <td>
                                    <form action="{{route('task.complete', $task->id)}}" method="POST">
                                        @csrf
                                    <button type="submit" class="bg-gray-500 text-white py-3 px-4 rounded-full">
                                        Complete
                                    </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <p> No Tasks Yet! </p>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
