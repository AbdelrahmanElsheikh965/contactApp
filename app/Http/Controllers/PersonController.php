<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Business;
use App\Models\person;
use App\Models\Tag;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('person.index', ['people' => Person::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('person.create')->with(
            [
                'businesses' => Business::all(),
                'tags' => Tag::all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonRequest $request)
    {
        if (! $request->has('tags')){
            Person::create($request->validated());
            return redirect(route('person.index'));
        }
        $person = Person::create($request->except(['tags', '_token']));
        $person->tags()->attach($request->tags);
        return redirect(route('person.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(person $person)
    {
        return view('person.show', ['person' => $person]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(person $person)
    {
        return view('person.edit', ['person' => $person, 'businesses' => Business::all(), 'tags' => Tag::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonRequest $request, person $person)
    {
        if (! $request->has('tags')){
            $person->update($request->validated());
            return redirect(route('person.index'));
        }
        $person->update($request->except(['tags', '_token']));
        $person->tags()->sync($request->tags);
        return redirect(route('person.index'));

//        $person->update($request->validated());
//        return redirect(route('person.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(person $person)
    {
        $person->delete();
        return redirect(route('person.index'));
    }
}
