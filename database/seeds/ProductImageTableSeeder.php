
<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use codecommerce\ProductImage;
use codecommerce\Product;
use Faker\Factory as Faker;

class ProductImageTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('product_images')->truncate();

    $faker = Faker::create();

    foreach (range(1,10) as $i) {

      ProductImage::create([
        'product_id' => $faker->numberBetween(1, 15),
         'extension' => $faker->word(),

      ]);

    }

  }

}
