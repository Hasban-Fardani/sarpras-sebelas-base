<?php

namespace Database\Seeders;

use App\Models\RequestItemDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestItemDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RequestItemDetail::factory(10)->create();
    }
}
