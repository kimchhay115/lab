<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $bookId1 = DB::table('tbl_books')->insertGetId([
            'BookTitle' => 'Introduction to Programming',
            'BookTypeID' => 4,
            'PublishDate' => '2023-01-15',
            'NumOfPages' => 350,
            'NumOfCopies' => 5,
            'Edition' => '2nd Edition',
            'Publisher' => 'Tech Press',
            'BookSource' => 'Purchase',
            'Remark' => 'Great book for beginners',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $bookId2 = DB::table('tbl_books')->insertGetId([
            'BookTitle' => 'Cambodian History',
            'BookTypeID' => 3,
            'PublishDate' => '2022-05-20',
            'NumOfPages' => 450,
            'NumOfCopies' => 3,
            'Edition' => '1st Edition',
            'Publisher' => 'History House',
            'BookSource' => 'Donation',
            'Remark' => 'Comprehensive history book',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $bookId3 = DB::table('tbl_books')->insertGetId([
            'BookTitle' => 'The River Tale',
            'BookTypeID' => 1,
            'PublishDate' => '2021-11-10',
            'NumOfPages' => 280,
            'NumOfCopies' => 10,
            'Edition' => '1st Edition',
            'Publisher' => 'Novel Press',
            'BookSource' => 'Purchase',
            'Remark' => 'Popular fiction',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tbl_book_authors')->insert([
            [
                'BookID' => $bookId1,
                'AuthorID' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'BookID' => $bookId2,
                'AuthorID' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'BookID' => $bookId2,
                'AuthorID' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'BookID' => $bookId3,
                'AuthorID' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
