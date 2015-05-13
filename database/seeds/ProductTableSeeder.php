<?php
    use CodeCommerce\Product;
    use Illuminate\Database\Seeder;
    use Faker\Factory as Faker;

    class ProductTableSeeder extends Seeder {

        public function run()
        {
            DB::table('products')->truncate();

            $faker = Faker::create('pt_BR');

            foreach (range(1, 40) as $i)
            {
                Product::create([
                    'name'        => $faker->word,
                    'description' => $faker->sentence(),
                    'price'       => $faker->randomFloat(2, 0, 10000),
                    'featured'    => $faker->numberBetween(0, 1),
                    'recommended' => $faker->numberBetween(0, 1),
                    'category_id' => $faker->numberBetween(1, 15)
                ]);
            }
        }

    }