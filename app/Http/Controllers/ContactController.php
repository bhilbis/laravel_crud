<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class ContactController extends Controller 
{
    public function index()
    {
        $contacts = contact::all();
        return view('crud.index', compact('contacts'));
    }

    public function contact()
    {
        return view('page.contact');
    }
    
    public function create()
    {
        return view('shared.contact-view');
    }

    public function store(postRequest $request)
    {

        Contact::create($request->all());

        return redirect()->route('index')
            ->with('Success', 'Contact created successfully.');
    }

    public function show(Contact $contact)
    {
        return view('crud.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('crud.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $contact->update($request->all());

        return redirect()->route('index')
            ->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('index')
            ->with('success', 'Contact deleted successfully.');
    }
}
