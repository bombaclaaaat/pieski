<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sponsor;

class SponsorzySeeder extends Seeder
{
    public function run()
    {
        Sponsor::create([
            'name' => 'Company A',
            'amount' => 10000,
        ]);

        Sponsor::create([
            'name' => 'Company B',
            'amount' => 5000,
        ]);
    }
}
