<?php

use Illuminate\Database\Seeder;
use App\Contact;
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(' App\Contact');
        $contacts = collect();

        foreach (range(1, 10000) as $index) {
            $contacts[] = [
                'first_name' => $faker->firstName,
                'last_name'  => $faker->lastName,
                'avatar'     => $faker->imageUrl($width = 640, $height = 480),
                'address'    => $faker->streetAddress,
                'city'       => $faker->city,
                'zip'        => $faker->randomNumber(6),
                'email'      => $faker->unique()->email,
                'phone'      => $faker->phoneNumber,
                'note'       => $faker->realText(2000)
            ];
        }

        foreach ($contacts->chunk(1000) as $chunk) {
            \DB::table('contacts')->insert($chunk->toArray());
        }
    }
}
