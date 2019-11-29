<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       foreach (Group::NAMES as $name) {
           Group::insert([
               'name' => $name
           ]);
       }
    }
}
