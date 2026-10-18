<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_authors')->insert([
            [
                'AuthorName' => 'Sok Chan',
                'AuthorBio' => 'Author from Phnom Penh.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'AuthorName' => 'Dara Srey',
                'AuthorBio' => 'Author from Siem Reap.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'AuthorName' => 'Vanna Reach',
                'AuthorBio' => 'Author from Battambang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
