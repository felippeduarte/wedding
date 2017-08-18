<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = [
            [
                'name' => 'teste',
                'price' => 100,
                'image' => 'teste.jpg',
                'description' => 'lorem ipsum',
            ],
        ];

        foreach($data as $d) {
            \App\Product::create($d);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::table('products')->truncate();
    }
}
