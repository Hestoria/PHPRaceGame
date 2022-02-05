<?php

Class Car {
	//total speed 22 && !< 4
	/**
	 * @var int of speedOnStraight
	 * @var int of speedOnCurve
	 * @var int of position in race
	 */
	private $speedOnStraight;
	private $speedOnCurve;
	private $position;
	private $name;

	function __construct($speedOnStraight, $speedOnCurve, $name){
		$this->position = 0;
		$this->speedOnStraight = $speedOnStraight;
		$this->speedOnCurve = $speedOnCurve;
		$this->name = $name;
	}

	function getSpeedOnStraight(): int {
		return $this->speedOnStraight;
	}

	function getSpeedOnCurve(): int {
		return $this->speedOnCurve;
	}

	function getPosition(): int {
		return $this->position;
	}

	function getName(): String{
		return $this->name;
	}

	function setSpeedOnStraight($speedOnStraight){
		$this->speedOnStraight = $speedOnStraight;
	}

	function setSpeedOnCurve($speedOnCurve){
		$this->speedOnCurve = $speedOnCurve;
	}

	function setPosition($position){
		$this->position = $position;
	}

}