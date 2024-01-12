<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function getAllContacts()
    {
        $contacts = ContactModel::all();
        return view('admin.allContacts', compact('contacts'));
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|max:64',
            'subject' => 'required|string',
            'message' => 'required|string|min:5'
        ]);

        ContactModel::create($validated);

        //ContactModel::create([
        //    'email' => $request->get('email'),
        //    'subject' => $request->get('subject'),
        //    'message' => $request->get('message')
        //]);

        return redirect()->route('contact.page')->withSuccess('Contact is created.');
    }

    public function deleteContact($id)
    {
        $contact = ContactModel::findOrFail($id);
        $contact->delete();
        return redirect()->back();
    }

    public function editContactPage($id)
    {
        $contact = ContactModel::findOrFail($id);
        return view('admin.editContact', compact('contact'));
    }

    public function updateContact(Request $request, $id)
    {
        $validated = $request->validate([
            'email' => 'required|string|max:64',
            'subject' => 'required|string',
            'message' => 'required|string|min:5'
        ]);

        $contact = ContactModel::findOrFail($id);

        $contact->email = $request->get('email');
        $contact->subject = $request->get('subject');
        $contact->message = $request->get('message');

        $contact->save();

        return redirect()->route('admin.all.contacts')->withSuccess('Contact ' . $contact->id . ' is edited.');
    }
}
