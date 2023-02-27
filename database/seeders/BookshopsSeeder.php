<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bookshop;
use DB;

class BookshopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // truncate the table bookshops (make sure to use DB above)
        // clears the table and resets the auto-increment
        DB::table('bookshops')->truncate();


        $bookshops = [
            'Prague' => [
                'Knihy Dobrovský',
                'Kosmas',
                'Neoluxor'
            ],
            'London' => [
                'Blackwell\'s',
                'Daunt Books',
                'Foyles',
                'John Smith & Son',
                'W H Smith',
                'Waterstones',
                'The Works'
            ],
            'New York' => [
                'Amazon Books',
                'Anderson\'s Bookshops',
                'Barnes & Noble',
                'Bookmans',
                'Books-A-Million',
                'Books, Inc.',
                'Deseret Book, also operates Seagull Book',
                'Follett\'s',
                'Half Price Books',
                'Hudson News',
                'Joseph-Beth Booksellers',
                'Kinokuniya',
                'Mardel Christian Stores',
                'Powell\'s Books',
                'Schuler Books & Music',
                'Tattered Cover'
            ]
        ];

        foreach ($bookshops as $city_name=>$bookshop_names) {
            foreach ($bookshop_names as $bookshop_name) {
                $bookshop = new Bookshop;
                $bookshop->city = $city_name;
                $bookshop->name = $bookshop_name;
                $bookshop->save();
            }
        }
    }
}
