<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\UpdateRequest;
use App\Services\ImageUploadService;
use App\Http\Requests\CreateRequest;
use Illuminate\Http\UploadedFile;

class ContactsController extends Controller
{
    /**
     * Storing new contact.
     *
     * @param CreateRequest $request
     * @param ImageUploadService $service
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(CreateRequest $request, ImageUploadService $service)
    {
        $contact = Contact::create(
            $request->except(['_token', 'groupId', 'avatar'])
        );
        $path = null;

        if ($request->has('avatar')) {
            $path = $service->upload($request->file('avatar'), 'avatar');
        }

         $contact->avatar = $path;
         $contact->save();
         $contact->groups()->attach($request->get('groupId'));

        return redirect('group-contacts?group='.$request->get('groupId'));
    }

    /**
     * @param null $contactId
     * @param null $groupId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($groupId = null)
    {
        return view('create' , ['group' => $groupId]);
    }

    /**
     * @param UpdateRequest $request
     * @param Contact $contact
     * @param ImageUploadService $service
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit(UpdateRequest $request, Contact $contact, ImageUploadService $service)
    {
        try {
            $data = $request->all();

            if ($request->has('avatar') && $request->avatar instanceof UploadedFile) {
                $data['avatar'] = $service->upload($request->file('avatar'), 'avatar');
            } else {
                $data['avatar'] = str_replace('/upload/images/', '', $contact->avatar);
            }

            $contact->update($data);

            return redirect('group-contacts?group='.$request->get('groupId'));
        } catch (\Exception $ex) {
            \Log::error($ex->getMessage());

            return back();
        }
    }

    /**
     * @param Contact $contact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function read(Contact $contact)
    {
        return view('read', ['note' => $contact->note, 'avatar' => $contact->avatar]);
    }
}
