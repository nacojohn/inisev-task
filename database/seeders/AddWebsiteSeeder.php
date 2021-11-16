<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Seeder;

class AddWebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Website::factory()->count(3)->create();
    }
}
