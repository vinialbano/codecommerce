<?php
    use CodeCommerce\Category;
    use Illuminate\Database\Seeder;
    use Faker\Factory as Faker;

    class CategoryTableSeeder extends Seeder {

        public function run()
        {
            DB::table('categories')->truncate();

            $faker = Faker::create('pt_BR');

            foreach (range(1, 15) as $i)
            {
                Category::create([
                    'name'        => $faker->word,
                    'description' => $faker->sentence()
                ]);
            }
        }

    }