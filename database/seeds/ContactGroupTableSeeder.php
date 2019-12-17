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
        $pivot = collect();

        Contact::chunk(500, function ($contacts) use ($pivot) {
            foreach ($contacts as $contact) {
                $pivot[] = [
                    "contact_id" => $contact->id,
                    'group_id'   => Group::inRandomOrder()->first()->id
                ];
            }
        });

        foreach ($pivot->chunk(500) as $chunk) {
            \DB::table('contact_group')->insert($chunk->toArray());
        }
        
        $pivot = collect();
    }
}
