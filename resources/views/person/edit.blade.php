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

                    <h3 class="font-semibold pb-3"> Edit a person: {{$person->first_name}}  {{$person->last_name}}</h3>
                    <form method="POST" action="{{route('person.update', $person->id)}}">
                        @csrf
                        @method('PUT')

                        @include('helpers.errors')
                        <br>

                        <div class="grid md:grid-cols-2 sm:grid-cols-6 gap-6">

                            <span class="sm:col-span-3">
                                <label class="block" for="firstname">First Name</label>
                                <input class="block w-full" type="text" name="first_name" id="firstname" value="{{old('first_name', $person->first_name)}}">
                            </span>

                            <span class="sm:col-span-3">
                                <label class="block" for="lastname">Last Name</label>
                                <input class="block w-full" type="text" name="last_name" id="lastname" value="{{old('last_name', $person->last_name)}}">
                            </span>

                            <span class="sm:col-span-3">
                                <label class="block" for="Email">Email</label>
                                <input class="block w-full" type="text" name="email" id="Email" value="{{old('email', $person->email)}}">
                            </span>

                            <span class="sm:col-span-3">
                                <label class="block" for="phone">Phone</label>
                                <input class="block w-full" type="text" name="phone" id="phone" value="{{old('phone', $person->phone)}}">
                            </span>

                            <span class="sm:col-span-3">
                                <label class="block" for="business">Business</label>
                                <select class="block w-full" name="business_id" id="business">
                                <option value=""> --Choose a business-- </option>
                                    @forelse($businesses as $business)
                                        <option value="{{$business->id}}" @selected($business->id == old('business_id', $person->business_id))>
                                            {{$business->business_name}}
                                        </option>
                                    @empty
                                        <option selected>No Businesses</option>
                                    @endforelse
                                </select>
                            </span>

                            <span class="sm:col-span-2">
                                @foreach($tags as $tag)
                                    <input type="checkbox" id="tag{{$tag->id}}" name="tags[]" value="{{$tag->id}}" @checked(in_array($tag->tag_name, $person->tags->pluck('tag_name')->toArray()))>
                                    <label for="tag{{$tag->id}}"> {{$tag->tag_name}} </label> &nbsp; &nbsp;
                                @endforeach
                            </span>

                        </div>

                        <div class="mt-6 flex items-center justify-end gap-6">
                            <a href="{{route('person.index')}}"> Cancel </a>
                            <button type="submit" class="bg-yellow-800 text-white py-2 px-3 rounded-full">Save</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
