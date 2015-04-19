<?php

class CharacteristicsSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
    {
        DB::table('characteristics')->delete();

        Characteristic::create(array(
            'name' => 'Age'));
        Characteristic::create(array(
            'name' => 'Disability'));
        Characteristic::create(array(
            'name' => 'Gender Reassignment'));
        Characteristic::create(array(
            'name' => 'Mariage and Civil Partnership'));
        Characteristic::create(array(
            'name' => 'Pregnancy and Maternity'));
        Characteristic::create(array(
            'name' => 'Race'));
        Characteristic::create(array(
            'name' => 'Religion and Belief'));
        Characteristic::create(array(
            'name' => 'Sex'));
        Characteristic::create(array(
            'name' => 'Sexual Orientation'));
    }

}
