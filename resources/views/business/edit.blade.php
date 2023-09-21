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

                    <h3 class="font-semibold pb-3"> Edit a business: {{$business->business_name}} </h3>
                    <form method="POST" action="{{route('business.update', $business->id)}}">
                        @csrf
                        @method('PUT')

                        @include('helpers.errors')
                        <br>

                        <div class="grid md:grid-cols-2 sm:grid-cols-6 gap-6">

                          <span class="sm:col-span-3">
                                <label class="block" for="BusinessName">Business Name</label>
                                <input class="block w-full" type="text" name="business_name" id="BusinessName" value="{{old('business_name', $business->business_name)}}">
                            </span>

                            <span class="sm:col-span-3">
                                <label class="block" for="ContactEmail">Contact Email</label>
                                <input class="block w-full" type="text" name="contact_email" id="ContactEmail" value="{{old('contact_email', $business->contact_email)}}">
                            </span>

                        </div>

                        <div class="mt-6 flex items-center justify-end gap-6">
                            <a href="{{route('business.index')}}"> Cancel </a>
                            <button type="submit" class="bg-yellow-800 text-white py-2 px-3 rounded-full">Save</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
