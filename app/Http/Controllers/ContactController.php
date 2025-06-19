<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::latest()->get(); 

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'      => 'required|string|min:6',
            'contact'   => 'required|digits:9|unique:contacts,contact',
            'email'     => 'required|email|unique:contacts,email',
        ]);

        Contact::create($validatedData);

        return redirect()->route('contacts.index')->with('success', 'Contato criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $validatedData = $request->validate([
            'name'      => 'required|string|min:6',
            'contact'   => [
                'required',
                'digits:9',
                Rule::unique('contacts')->ignore($contact->id),
            ],
            'email'     => [
                'required',
                'email',
                Rule::unique('contacts')->ignore($contact->id),
            ],
        ]);

        $contact->update($validatedData);

        return redirect()->route('contacts.index')->with('success', 'Contato atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contato movido para a lixeira!');
    }
}
