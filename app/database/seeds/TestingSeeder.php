<?php

use Faker\Factory as Faker;

class TestingSeeder extends Seeder {

    const USERS = 20;
    const MIN_HORSES = 0;
    const MAX_HORSES = 5;
    const PASSWORD = 'horse123';

    private $faker;

	/**
	 * Run the database seeds.
	 * @return void
	 */
	public function run()
	{
        if (!$this->faker) {
            $this->faker = Faker::create();
        }

        $userIds = [];
        DB::table('users')->delete();
        for ($i = 1; $i <= self::USERS; $i++) {
            $userIds[] = $i;
            User::create([
                'id' => $i,
                'email' => $this->faker->safeEmail,
                'username' => $this->faker->userName,
                'password' => Hash::make(self::PASSWORD),
            ]);
        }

        DB::table('horses')->delete();
        foreach ($userIds as $userId) {
            $limit = rand(self::MIN_HORSES, self::MAX_HORSES);
            for ($i = 0; $i < $limit; $i++) {
                Horse::create([
                    'name' => $this->faker->firstName,
                    'occupation' => $this->faker->bs,
                    'chilling' => $this->faker->boolean(75),
                    'bio' => $this->faker->text(200),
                    'likes' => $this->faker->numberBetween(0, 1000),
                    'user_id' => $userId,
                ]);
            }
        }

        $this->command->info('Testing seed complete.');
	}

}
