<?php

use Faker\Factory as Faker;

class TestingSeeder extends Seeder {

    const HORSES = 20;

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

        DB::table('horses')->delete();
        for ($i = 1; $i <= self::HORSES; $i++) {
            Horse::create([
                'id' => $i,
                'name' => $this->faker->firstName,
                'occupation' => $this->faker->bs,
                'bio' => $this->faker->text(200),
                'likes' => $this->faker->numberBetween(0, 1000),
            ]);
        }

        $this->command->info('Testing seed complete.');
	}

}
