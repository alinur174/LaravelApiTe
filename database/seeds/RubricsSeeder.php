<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Facade;

class RubricsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rubrics = [];
//        $rubrics = ['name' => $rName ];
        for ($i = 0; $i<2; $i++)
        {
            $rName = ($i == 0) ? 'sports' : 'politics';

            $rubrics[] = [
                'name' => $rName
            ];
        }

        \Illuminate\Support\Facades\DB::table('Rubrics')->insert($rubrics);

    }
}
