<?php

use Illuminate\Database\Seeder;
use App\Contact;
use App\Group;

class ContactGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::chunk(100, function ($contacts) {
            foreach ($contacts as $contact) {
                $contact->groups()->attach(Group::inRandomOrder()->first()->id);
            }
        });
    }
}
