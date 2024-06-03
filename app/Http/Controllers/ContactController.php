<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
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
            ->paginate(20);

        return Inertia::render('Contacts/Index', compact('contacts', 'filters'));
    }

    public function create()
    {
        return Inertia::render('Contacts/Create');
    }

    public function store(StoreContactRequest $request)
    {
    }

    public function show(Contact $contact)
    {
    }

    public function edit(Contact $contact)
    {
        return Inertia::render('Contacts/Edit', compact('contact'));
    }

    public function update(UpdateContactRequest $request, Contact $contact)
    {
    }

    public function destroy(Contact $contact)
    {
    }
}
