<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\CreateRequest;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
{
    public function create(CreateRequest $request)
    {
        $contact = Contact::create(
            $request->except(['_token', 'groupId', 'avatar'])
        );

        $path = null;

        if ($request->has('avatar')) {
            $path = $request->file('avatar')->store('avatars');
        }

         $contact->avatar = $path;

         $contact->save();
         $contact->groups()->attach($request->get('groupId'));

        return redirect('group-contacts?group='.$request->get('groupId'));
    }

    public function show($contactId = null, $groupId = null)
    {
        $contact = null;

        if ($contactId) {
            $contact = Contact::find($contactId);
        }

        return view('create' , ['contact' => $contact, 'group' => $groupId]);
    }

    public function edit(CreateRequest $request, Contact $contact)
    {
        DB::transaction(function () use ($contact, $request) {
            $contact->update($request->except(['_token', 'groupId']));
        });

        return redirect('group-contacts?group='.$request->get('groupId'));
    }

    public function read(Contact $contact)
    {
        return view('read', ['note' => $contact->note, 'avatar' => $contact->avatar]);
    }
}
