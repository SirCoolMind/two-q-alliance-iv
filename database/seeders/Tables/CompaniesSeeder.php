<?php
namespace Database\Seeders\Tables;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Command :
         * artisan seed:generate --table-mode --tables=companies
         *
         */
        DB::table("companies")->truncate();
        $dataTables = [
            [
                'id' => 1,
                'name' => 'Facebook Inc.',
                'email' => 'facebook@meta.com',
                'logo_path' => NULL,
                'website_url' => 'facebook.com',
                'created_at' => '2025-03-13 20:21:56',
                'updated_at' => '2025-03-13 20:21:56',
            ],
            [
                'id' => 2,
                'name' => 'Instagram Inc.',
                'email' => 'instagram@meta.com',
                'logo_path' => NULL,
                'website_url' => 'instagram.com',
                'created_at' => '2025-03-13 20:50:27',
                'updated_at' => '2025-03-13 20:50:27',
            ],
            [
                'id' => 3,
                'name' => 'Alphabet Inc,',
                'email' => 'google@alphabet.com',
                'logo_path' => NULL,
                'website_url' => 'google.com',
                'created_at' => '2025-03-13 21:18:29',
                'updated_at' => '2025-03-13 21:23:09',
            ]
        ];
        
        DB::table("companies")->insert($dataTables);
    }
}