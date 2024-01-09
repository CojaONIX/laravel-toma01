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
        $request->validate([
            'email' => 'required|string|max:64',
            'subject' => 'required|string',
            'message' => 'required|string|min:5'
        ]);

        ContactModel::create([
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return redirect()->route('contactPage')->withSuccess('Contact is created.');
    }

    public function deleteContact($id)
    {
        $contact = ContactModel::findOrFail($id);
        $contact->delete();
        return redirect()->back();
    }
}
