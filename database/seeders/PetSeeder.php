<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Pet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $persons = Person::all();

        foreach($persons as $person)
        {
            Pet::factory()->count(2)->create(['person_id'=>$person->id]);
        }
    }
}
