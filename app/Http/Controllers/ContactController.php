<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Country;
use App\Models\Organization;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $filters = $request->all('search');

        $contacts = Contact::with('organization')
            ->filter($filters)
            ->latest('id')
            ->paginate(20);

        return Inertia::render('Contacts/Index', compact('contacts', 'filters'));
    }

    public function create()
    {
        $organizations = Organization::all();
        $countries = Country::all();
        
        return Inertia::render('Contacts/Create', compact('organizations', 'countries'));
    }

    public function store(Request $request)
    {
       $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'organization_id' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country_id' => 'required',
            'postal_code' => 'required'
        ]);

        $contact = Contact::create($data);

        return redirect()->route('contacts.edit', compact('contact'));
    }

    public function show(Contact $contact)
    {
    }

    public function edit(Contact $contact)
    {
        $organizations = Organization::all();
        $countries = Country::all();

        return Inertia::render('Contacts/Edit', compact('contact', 'organizations', 'countries'));
    }

    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'organization_id' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country_id' => 'required',
            'postal_code' => 'required'
        ]);

        $contact->update($data);

        return redirect()->route('contacts.edit', $contact);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index');
    }
}
