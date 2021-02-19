<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest as ContactRequest;
use Illuminate\Http\Request;
use App\Models\{Contact, Country, City};
use Illuminate\Support\Facades\Route;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug = null)
    {
        $model = null;
        $query = $model ? $model->whereSlug($slug)->firstOrFail()->contact() : Contact::query();
        $contacts = $query
            ->withTrashed()
            ->oldest('name')
            ->paginate(8);
        return view('contacts/index', compact('contacts'));
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();

        return view('contacts/create', compact('countries','cities'));
    }

    public function store(ContactRequest $contactRequest)
    {
        Contact::create($contactRequest->all());
        return redirect()->route('contacts.index')->with('info', 'Le contacts a bien été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $country = Country::all();
        $city = City::all();
        return view('/contacts/edit', compact('country','contact','city'));
    }

    public function update(ContactRequest $contactRequest, Contact $contact)
    {
        $contact->update($contactRequest->all());
        return redirect()->route('contacts.index')->with('info', 'Le contacts a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('info', 'Le contacts a bien été mis dans la corbeille.');
    }

    public function forceDestroy($id)
    {
        Contact::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
        return back()->with('info', 'Le contacts a bien été supprimé définitivement dans la base de données.');
    }

    public function restore($id)
    {
        Contact::withTrashed()->whereId($id)->firstOrFail()->restore();
        return back()->with('info', 'Le contacts a bien été restauré.');
    }
}
