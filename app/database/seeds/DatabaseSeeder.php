<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

                $this->call('UserTableSeeder');
                $this->call('AmenitiesTableSeeder');
                $this->call('RestrictionsTableSeeder');
                $this->call('CitiesTableSeeder');
                $this->call('StreetsTableSeeder');
                $this->call('CityStreetsTableSeeder');
                $this->call('HabitationsTableSeeder');
	}

}
