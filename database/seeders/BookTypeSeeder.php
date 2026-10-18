<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_book_types')->insert([
            ['BookTypeName' => 'Novel', 'created_at' => now(), 'updated_at' => now()],
            ['BookTypeName' => 'Science', 'created_at' => now(), 'updated_at' => now()],
            ['BookTypeName' => 'History', 'created_at' => now(), 'updated_at' => now()],
            ['BookTypeName' => 'Technology', 'created_at' => now(), 'updated_at' => now()],
            ['BookTypeName' => 'Philosophy', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
