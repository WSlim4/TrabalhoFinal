<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(SupplierTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(MerchandiseTableSeeder::class);
<<<<<<< HEAD
=======
        $this->call(PurchaseTableSeeder::class);
>>>>>>> 4f807891177a94cba0c8b23086717f8a64a407b8
    }
}
