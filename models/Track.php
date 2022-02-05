<?php

class Track {

	/*
	 *		2000 ele , 40 for each = 50;
	 *		around 50% (45% - 55%) of str and curve = 23 ~ 37;
   */

	/**
	 * @var array of elements and type (Curve or Straight)
	 */
	private $Track;

	private function generateTrack(){
		$tempTrack = [];

		$numberOfStr = rand(23,27);
		for ($i = 0 ; $i < $numberOfStr ; $i++){
			$tempTrack[] = "straight";
		}
		for ($i = 0 ; $i < 50 - $numberOfStr ; $i++){
			$tempTrack[] = "curve";
		}
		shuffle($tempTrack); // mess it up!
		return $tempTrack;
	}

	function __construct() {
		$this->Track = $this->generateTrack();
	}

	function getTrack(): array{
		return $this->Track;
	}

}