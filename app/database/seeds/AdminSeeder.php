<?php

class AdminSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
    {
        DB::table('users')->delete();

        User::create(array('email' => 'admin@equality.com',
        					'password' => Hash::make('password'),
        					'first_name' => 'Jan',
        					'last_name' => 'Putzan'));
    }

}
