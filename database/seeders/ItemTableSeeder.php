<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $items=[
            [
                'name'=>'Item 1',
                'price'=>200
            ],
            [
                'name'=>'Item 2',
                'price'=>500
            ]
        ];
        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
