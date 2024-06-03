<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = array([
			'title' => 'Product 1',
			'slug' => esc(str_slug('product 1')),
			'f_thumbnail' => '1.jpg',
			'description' => 'Product 1',
			'user_id' => 1,
			'sale_price' => 120,
			'stock_qty' =>5,
			'created_at' =>Carbon::now(),
			'updated_at' =>Carbon::now(),
        ],
        [
			'title' => 'Product 2',
			'slug' => esc(str_slug('product 2')),
			'f_thumbnail' => '2.jpg',
			'description' => 'Product 2',
			'user_id' => 1,
			'sale_price' => 122,
			'stock_qty' =>5,
			'created_at' =>Carbon::now(),
			'updated_at' =>Carbon::now(),
        ],
        [
			'title' => 'Product 3',
			'slug' => esc(str_slug('product 3')),
			'f_thumbnail' => '3.jpg',
			'description' => 'Product 3',
			'user_id' => 1,
			'sale_price' => 123,
			'stock_qty' =>5,
			'created_at' =>Carbon::now(),
			'updated_at' =>Carbon::now(),
        ],
        [
			'title' => 'Product 4',
			'slug' => esc(str_slug('product 4')),
			'f_thumbnail' => '4.jpg',
			'description' => 'Product 4',
			'user_id' => 1,
			'sale_price' => 124,
			'stock_qty' =>5,
			'created_at' =>Carbon::now(),
			'updated_at' =>Carbon::now(),
        ],
        [
			'title' => 'Product 5',
			'slug' => esc(str_slug('product 5')),
			'f_thumbnail' => '5.jpg',
			'description' => 'Product 5',
			'user_id' => 1,
			'sale_price' => 125,
			'stock_qty' =>5,
			'created_at' =>Carbon::now(),
			'updated_at' =>Carbon::now(),
        ],
        [
			'title' => 'Product 6',
			'slug' => esc(str_slug('product 6')),
			'f_thumbnail' => '6.jpg',
			'description' => 'Product 6',
			'user_id' => 1,
			'sale_price' => 126,
			'stock_qty' =>5,
			'created_at' =>Carbon::now(),
			'updated_at' =>Carbon::now(),
        ],[
			'title' => 'Product 7',
			'slug' => esc(str_slug('product 7')),
			'f_thumbnail' => '7.jpg',
			'description' => 'Product 7',
			'user_id' => 1,
			'sale_price' => 127,
			'stock_qty' =>5,
			'created_at' =>Carbon::now(),
			'updated_at' =>Carbon::now(),
        ],
        [
			'title' => 'Product 8',
			'slug' => esc(str_slug('product 8')),
			'f_thumbnail' => '8.jpg',
			'description' => 'Product 8',
			'user_id' => 1,
			'sale_price' => 128,
			'stock_qty' =>5,
			'created_at' =>Carbon::now(),
			'updated_at' =>Carbon::now(),
        ],
		);

		 Product::insert($data);
    }
}
