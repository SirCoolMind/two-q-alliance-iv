<?php
namespace Database\Seeders\Tables;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
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
         * artisan seed:generate --table-mode --tables=users
         *
         */

        $dataTables = [
            [
                'id' => 1,
                'name' => 'testuser',
                'email' => 'testuser@getnada.com',
                'email_verified_at' => '2025-03-13 19:03:56',
                'password' => '$2y$12$0V7B82J4fOiLZejnD6szFeImhohOoCO1Wxwf.hVNwuwjRsCTBmZgO',
                'remember_token' => NULL,
                'created_at' => '2025-03-13 19:03:56',
                'updated_at' => '2025-03-13 19:03:56',
            ],
            [
                'id' => 2,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$2JBztVqibK.QROAdPLMfPOffXY0wX.q2tdRMgN5palBzJrKAtaWmi',
                'remember_token' => NULL,
                'created_at' => '2025-03-13 19:08:08',
                'updated_at' => '2025-03-13 19:08:08',
            ]
        ];
        
        DB::table("users")->insert($dataTables);
    }
}