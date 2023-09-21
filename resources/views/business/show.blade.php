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

                    <strong> Business Details: </strong>
                    <br> <br>
                    <form class="w-full max-w-sm">
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/2">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-3" for="inline-full-name">
                                    Business Name:
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input disabled style="width: 500px" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                                 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="{{$business->business_name}}">
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/2">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-3" for="inline-full-name">
                                    Contact Email:
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input disabled style="width: 500px" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                                 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="{{$business->contact_email}}">
                            </div>
                        </div>

                        <strong> Tasks: </strong>
                        @forelse($business->tasks as $task)
                            <p class="font-semibold"> {{$task->title}} </p>
                            <p> {{$task->description}} </p>
                            <p> Status =  {{$task->status}} </p>
                        @empty
                            <br> <br>
                            <p> <u>No tasks yet.</u> </p>
                        @endforelse
                    </form>

                        <div class="mt-6 flex items-center justify-end gap-6">
                            <a href="{{route('business.edit', $business->id)}}" type="submit" class="bg-blue-800 text-white py-2 px-3 rounded-full">  Edit this business </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
