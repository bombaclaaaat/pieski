<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dog;

class PsySeeder extends Seeder
{
    public function run()
    {
        Dog::create([
            'name' => 'Rex',
            'breed' => 'German Shepherd',
            'age' => 3,
            'owner_id' => 1, // Assuming the owner is the first user
        ]);

        Dog::create([
            'name' => 'Bella',
            'breed' => 'Labrador',
            'age' => 2,
            'owner_id' => 2,
        ]);
    }
}

