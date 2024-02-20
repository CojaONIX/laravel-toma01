<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
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

    public function sendContact(ContactRequest $request)
    {

        ContactModel::create([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message')
        ]);

        return redirect()->route('contact.page')->withSuccess('Contact is created.');
    }

    public function deleteContact(ContactModel $contact)
    {
        $contact->delete();
        return redirect()->back();
    }

    public function editContactPage(ContactModel $contact)
    {
        return view('admin.editContact', compact('contact'));
    }

    public function updateContact(Request $request, ContactModel $contact)
    {

        $contact->email = $request->get('email');
        $contact->subject = $request->get('subject');
        $contact->message = $request->get('message');

        $contact->save();

        return redirect()->route('admin.all.contacts')->withSuccess('Contact ' . $contact->id . ' is edited.');
    }
}
