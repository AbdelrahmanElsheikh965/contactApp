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

                    <strong> Person Details: </strong>
                    <br> <br>
                    <form class="w-full max-w-sm" method="POST">
                        @csrf
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/2">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-3" for="inline-full-name">
                                    Name:
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input disabled style="width: 500px" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                                 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="{{$person->first_name}} {{$person->last_name}}">
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/2">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-3" for="inline-full-name">
                                    Email:
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input disabled style="width: 500px" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                                 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="{{$person->email}}">
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/2">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-3" for="inline-full-name">
                                    Birthday:
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input disabled style="width: 500px" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                                 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="{{$person->birthday}}">
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/2">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-3" for="inline-full-name">
                                    Phone:
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input disabled style="width: 500px" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                                 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="{{$person->phone}}">
                            </div>
                        </div>

                        <strong> Tasks: </strong>
                        @forelse($person->tasks->sortByDesc('created_at') as $task)
                            <p class="font-semibold"> {{$task->title}} </p>
                            <p> {{$task->description}} </p>
                            <p> Status =  {{$task->status}} </p>
                            <br>
                            @if($task->status !== 'completed')
                                <div class="mt-6 flex items-center justify-end gap-6">
                                    <input formaction="{{route('task.complete', $task->id)}}"
                                           type="submit" class="bg-green-800 text-white py-2 px-3 rounded-full" value="Mark as completed">
                                </div>
                            @endif
                        @empty
                            <br> <br>
                            <p> <u>No tasks yet.</u> </p>
                        @endforelse

                    </form>

                        <div class="mt-6 flex items-center justify-end gap-6">
                            <a href="{{route('person.edit', $person->id)}}" type="submit" class="bg-blue-800 text-white py-2 px-3 rounded-full">  Edit this Person </a>
                        </div>
                </div>

                <hr>

                <div class="p-6 text-gray-900">
                    <strong> Create a task: </strong>
                    <br> <br>
                    @include('helpers.errors')
                    <br>
                    <form class="w-full max-w-sm" action="{{route('task.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="taskable_id" value="{{$person->id}}">
                        <input type="hidden" name="target_model" value="person">
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/2">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-3" for="inline-full-name">
                                    Task Title:
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input style="width: 500px" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                                 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" name="title" type="text" value="{{ old('title') }}">
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/2">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-3" for="inline-full-name">
                                    Description:
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input style="width: 500px" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                                 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" name="description" type="text" value="{{ old('description') }}">
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-6">
                            <input type="submit" class="bg-blue-800 text-white py-2 px-3 rounded-full" value="Save this new task">
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>
</x-app-layout>
