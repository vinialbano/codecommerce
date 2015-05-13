<?php
    use CodeCommerce\User;
    use Faker\Factory as Faker;
    use Illuminate\Database\Seeder;

    class UserTableSeeder extends Seeder {

        public function run()
        {
            DB::table('users')->truncate();

            $faker = Faker::create('pt_BR');
            $array = [];

            foreach (range(1, 20) as $i)
            {
                User::create([
                    'name'     => $faker->name,
                    'email'    => $faker->email(),
                    'password' => Hash::make($faker->word())
                ]);
            }
        }

    }