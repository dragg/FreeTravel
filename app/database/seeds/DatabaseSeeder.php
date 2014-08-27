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
                $this->call('HabitationsTableSeeder');
                $this->call('HabitationAmenitiesTableSeeder');
                $this->call('HabitationRestrictionsTableSeeder');
                $this->call('RequestsTableSeeder');
	}

}
