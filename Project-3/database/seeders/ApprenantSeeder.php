<?php

namespace Database\Seeders;

use App\Models\Apprenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApprenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Apprenant::factory(Apprenant::class)->count(50)->create();
    }
}
