<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use App\Models\ContactModel;

class ContactController extends Controller
{
    private $contactRepo;
    public function __construct()
    {
        $this->contactRepo = new ContactRepository();
    }

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
        $this->contactRepo->createNew($request);
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
        $this->contactRepo->editContact($request, $contact);
        return redirect()->route('admin.contact.all.page')->withSuccess('Contact ' . $contact->id . ' is edited.');
    }
}
