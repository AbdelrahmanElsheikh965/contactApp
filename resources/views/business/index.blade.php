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
                        <a href="{{route('business.create')}}" class="bg-gray-500 text-white py-2 px-3 rounded-full"> Add Business </a>
                    </div>

                    <table class="table-fixed border-separate border-spacing-6">
                        <thead>
                            <tr>
                                <th>Business Name</th>
                                <th>Contact Email</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th># People</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($businesses as $business)
                            <tr>
                                <td><a href="{{route('business.show', $business->id)}}"> {{ __($business->business_name) }} </a>  </td>
                                <td> {{ __($business->contact_email) }} </td>
                                <td>
                                    @foreach($business->categories as $cat)
                                        <p>{{$cat->category_name}}</p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($business->tags as $tag)
                                        {{$tag->tag_name}}
                                    @endforeach
                                </td>
                                <td>
                                    {{ $business->people_count }}
                                </td>
                                <td>
                                    <a href="{{route('business.edit', $business->id)}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                            <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                        </svg>
                                    </a>
                                </td>

                                <td>
                                    <form action="{{route('business.delete', $business->id)}}" method="POST">
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
                            <p>no businesses here.</p>
                        @endforelse
                        </tbody>
                    </table>
                    {{$businesses->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
