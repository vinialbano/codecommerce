<?php

    use CodeCommerce\Product;
    use CodeCommerce\Tag;
    use Illuminate\Database\Seeder;
    use Faker\Factory as Faker;

    class TagTableSeeder extends Seeder
    {

        public function run() {
            DB::table('tags')->truncate();

            $faker = Faker::create('pt_BR');

            foreach (range(1, 15) as $i) {
                Tag::create([
                    'name' => ucfirst($faker->word)
                ]);
            }

            foreach (range(1, 40) as $i) {
                $tags = [];
                foreach (range(1, rand(1, 15)) as $j) {
                    array_push($tags, rand(1,15));
                }
                Product::find($i)->tags()->sync(array_unique($tags));
            }
        }

    }