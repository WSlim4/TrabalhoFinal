<?php

use Illuminate\Database\Seeder;

class MerchandiseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Merchandise::class, 10)->create();
    }
}
