<?php
    use CodeCommerce\User;
    use Faker\Factory as Faker;
    use Illuminate\Database\Seeder;

    class UserTableSeeder extends Seeder {

        public function run()
        {
            DB::table('users')->truncate();

            User::create(['name' => 'Admin', 'email' => 'contato@tribitjr.com', 'password' => Hash::make('admin'), 'is_admin' => true]);

            $faker = Faker::create('pt_BR');

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