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

                    Note : businesses in <i style="color: red"> italic </i>  is deleted but still there!

                    <table class="table-fixed border-separate border-spacing-6">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Business</th>
                                <th>Tags</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($people as $person)
                            <tr>
                                <td>
                                    <a href="{{route('person.show', $person->id)}}">
                                        {{ __($person->first_name) }} {{ __($person->last_name) }}
                                    </a>
                                </td>
                                <td> {{ __($person->email) }} </td>
                                <td> {{ __($person->phone) }} </td>
                                <td class="{{ ($person->business?->deleted_at)? 'italic': 'non-italic'}}"> {{ __($person->business?->business_name) }} </td>
                                <td>
                                    @foreach($person->tags as $tag)
                                        <small class="bg-blue-800 text-white py-2 px-3 rounded-full">
                                            {{$tag->tag_name}}
                                        </small> &nbsp;
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('person.edit', $person->id)}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                            <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                        </svg>
                                    </a>
                                </td>

                                <td>
                                    <form action="{{route('person.delete', $person->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" onclick="if (confirm('Are you sure?')) {/* Submit */} else { return false; }" class="bg-red-800 text-white py-2 px-3 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <p>no people here.</p>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $people->links()  }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
