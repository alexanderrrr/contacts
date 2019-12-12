<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupContactsController extends Controller
{
    public function index(Request $request) {
        $group = Group::findOrFail($request->get('group'));
        $contacts = $group->contacts()->latest()->simplePaginate(6);

        $contacts->setPath('group-contacts?group='.$request->get('group'));

        return view('groupContacts', ['contacts' => $contacts , 'group' => $group->name, 'groupId' => $group->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact, $groupId = null)
    {
        return view('edit', ['contact' => $contact, 'group' => $groupId]);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Group $group, Contact $contact)
    {
        DB::transaction(function () use ($contact) {
            $contact->delete();
        });

        $contact->groups()->detach($group->id);

        return redirect('group-contacts?group='.$group->id);
    }
}
