<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ReviewTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = array([
			'item_id' =>1,
			'user_id' => 2,
			'rating' => 5,
			'comments' => "good",
			'created_at' =>Carbon::now(),
			'updated_at' =>Carbon::now(),
        ],
        [
			'item_id' =>2,
			'user_id' => 2,
			'rating' => 5,
			'comments' => "good",
			'created_at' =>Carbon::now(),
			'updated_at' =>Carbon::now(),
        ],
		);

		 DB::table('reviews')->insert($data);
    }
}
