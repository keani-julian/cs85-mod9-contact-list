<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource: contacts (newest first).
     */
    public function index(): View
    {
        $contacts = Contact::latest()->get();

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource: contact.
     */
    public function create(): View
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource (contact) in storage (the database).
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|string|max:20',
        ]);

        Contact::create($validated);

        return redirect()->route('contacts.index')
            ->with('success', 'Contact added successfully.');
    }

    /**
     * Display the specified resource:
     * No dedicated show page for this app. Sends to the edit form instead.
     */
    public function show(Contact $contact): RedirectResponse
    {
        return redirect()->route('contacts.edit', $contact);
    }

    /**
     * Show the form for editing the specified resource (contact).
     */
    public function edit(Contact $contact): View
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource (contact) in storage (the database).
     */
    public function update(Request $request, Contact $contact): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email,'.$contact->id,
            'phone' => 'required|string|max:20',
        ]);

        $contact->update($validated);

        return redirect()->route('contacts.index')
            ->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource (contact) from storage (the database).
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contact deleted successfully.');
    }
}
