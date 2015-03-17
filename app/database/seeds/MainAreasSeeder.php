<?php

class MainAreasSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
    {
        DB::table('main_areas')->delete();

        MainArea::create(array(
            'name' => 'Eliminate Discrimination'));
        MainArea::create(array(
            'name' => 'Advance Equality of Opportunity'));
        MainArea::create(array(
            'name' => 'Foster Good Relations'));
        
    }

}
