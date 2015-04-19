<?php namespace Helpers;

class Result {

	static public function getAverageScore($user) {

		$total = 0;
		$count = 0;

		foreach ($user->tests as $test) {

			if (TestAction::isFinished($test)) {

				$total += TestAction::getResult($test);
				$count++;
			}
		}

		if ($count && $total) {

			$result = $total/$count;
		} else {

			$result = 0;
		}

		return $result;
	}

	static public function getBestScore($user) {

		$best = 0;

		foreach ($user->tests as $test) {
			
			if (TestAction::isFinished($test)) {

				if (TestAction::getResult($test) > $best) {

					$best = TestAction::getResult($test);

				}
			}
		}

		return $best;
	}

	static public function hasPassed($user) {

		foreach ($user->tests as $test) {
			
			if (TestAction::isFinished($test)) {

				if (TestAction::getResult($test) > 21) {

					return true;
				}
			}
		}

		return false;
	}

}