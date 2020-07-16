<?php

use Illuminate\Database\Seeder;
use App\Models\Authors;
use App\Models\News;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(RubricsSeeder::class);
        factory(Authors::class, 3)->create();
        factory(News::class, 10)->create();
    }
}
