<?php

class QuestionsAndAnswersSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
    {
        DB::table('questions')->delete();
        DB::table('answers')->delete();

        $characteristics = Characteristic::all();

        $mainAreas = MainArea::all();

        $question_id = 1;

        foreach ($characteristics as $characteristic) {
            
            foreach ($mainAreas as $mainArea) {

                Question::create(array(
                    'id' => $question_id,
                    'characteristic_id' => $characteristic->id,
                    'main_area_id' => $mainArea->id,
                    'body' => 'What would you do to '.$mainArea->name.' in regards to '.$characteristic->name.'?'));

                    Answer::create(array(
                        'question_id' => $question_id,
                        'body' => 'Answer number 1, that might, or might not be obvious, neither apparent.',
                        'is_right' => false));

                    Answer::create(array(
                        'question_id' => $question_id,
                        'body' => 'Answer number 2, that is lacking substantial value.',
                        'is_right' => false));

                    Answer::create(array(
                        'question_id' => $question_id,
                        'body' => 'Answer number 3, that is clearly wrong. Or is it?.',
                        'is_right' => true));

                    Answer::create(array(
                        'question_id' => $question_id,
                        'body' => 'Answer number 4, that you know you won\'t choose, but you can\'t stop thinking about.',
                        'is_right' => false));

                $question_id++;
            }
        }
    }

}
