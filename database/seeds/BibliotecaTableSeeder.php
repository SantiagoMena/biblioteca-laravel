<?php

use Illuminate\Database\Seeder;

class BibliotecaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Biblioteca::class, 50)->create();
    }
}
