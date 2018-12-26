<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizzas')->insert([
            'name' => 'Margherita',
            'ingredients' => 'Sos pomidorowy, ser mozzarella',
            'price_small' => '15.50',
            'price_medium' => '25.50',
            'price_large' => '30.00',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('pizzas')->insert([
            'name' => 'Napulitano',
            'ingredients' => 'Sos pomidorowy, mozzarella, szynka',
            'price_small' => '20.50',
            'price_medium' => '30.50',
            'price_large' => '33.00',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('pizzas')->insert([
            'name' => 'Australiana',
            'ingredients' => 'Sos pomidorowy, mozzarella, podwójna pieczona wołowina, podwójny boczek',
            'price_small' => '20.50',
            'price_medium' => '26.50',
            'price_large' => '35.00',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('pizzas')->insert([
            'name' => 'Capo del mafia',
            'ingredients' => 'Sos pomidorowy, mozzarella, kiełbasa pepperoni, papryka, biała cebula, przyprawa chili',
            'price_small' => '22.50',
            'price_medium' => '28.90',
            'price_large' => '37.20',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('pizzas')->insert([
            'name' => 'Frutti di tua sorella',
            'ingredients' => 'sos BBQ, mozzarella, kiełbasa pepperoni, grillowany kurczak, papryka, biała cebula',
            'price_small' => '24.50',
            'price_medium' => '30.90',
            'price_large' => '39.20',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('pizzas')->insert([
            'name' => 'Cazzone',
            'ingredients' => 'sos pomidorowy, mozzarella, szynka, ananas',
            'price_small' => '21.50',
            'price_medium' => '26.90',
            'price_large' => '29.20',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
    }
}
