<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Busca todos os contatos do banco, ordenando pelos mais recentes
        $contacts = Contact::latest()->get(); 

        // Retorna a view 'contacts.index' e passa a variável 'contacts' para ela
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
        // Validate contact
        $validatedData = $request->validate([
            'name'      => 'required|string|min:6',
            'contact'   => 'required|digits:9|unique:contacts,contact',
            'email'     => 'required|email|unique:contacts,email',
        ]);

        // If validated, create new contact
        Contact::create($validatedData);

        // Redirect to contacts list
        return redirect()->route('contacts.index')->with('success', 'Contato criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
