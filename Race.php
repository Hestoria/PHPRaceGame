<?php
include('./models/Car.php');
include('./models/Track.php');
include('RoundResult.php');
include('RaceResult.php');

class Race{
    public function runRace(): RaceResult{

        $RaceResult = new RaceResult();
        $Track = new Track();
        $Track = $Track->getTrack();
        $step = 1;
        for($i = 0 ; $i < 5 ; $i++){
            $speedOnStraight = rand(4,14);
            $carList[] = new Car($speedOnStraight, 22 - $speedOnStraight, "Car ".$i);
        }

        //loop till someone win
        while($this->checkRaceNotEnded($carList)){
            $this->main($carList,$Track,$step);
            $RaceResult->pushRoundResults(new RoundResult($step, $this->getCarsPosition($carList)));
            $step++;
        }

        //get the winner
        $RaceResult->setWinner($this->checkWinner($carList));
        return $RaceResult;
    }

    function checkRaceNotEnded($carList): bool {
        // checking all the car's position
        // if anyone reach the goal
        // return false to stop the race
        foreach($carList as $car){
            if($car->getPosition() >= 2000){ //2000
                return false;
            }
        }
        return true;
    }

    function getCarsPosition($carList): array{
        // return all the car's position
        for($i = 0 ; $i < 5 ; $i++){
            $carsPosition[$i] = $carList[$i]->getPosition();
        }
        return $carsPosition;
    }

    function main($carList,$Track){
        foreach($carList as $car){
            $currentBlock = round($car->getPosition()/40);
            if($Track[$currentBlock] == 'straight'){
                if($this->checkMoveToNext($currentBlock, $car->getPosition() + $car->getSpeedOnStraight())){
                    if($currentBlock+1 < 50 && $Track[$currentBlock+1] == 'straight'){
                    // car moving to the next block and the track is still straight
                        $car->setPosition(
                            $car->getPosition() +
                            $car->getSpeedOnStraight());
                    }else{
                        // car moving to the next block and the track is not straight
                        $car->setPosition(($currentBlock+1)*40);
                    }
                }else{
                    // not moving to next block
                    $car->setPosition(
                        $car->getPosition() +
                        $car->getSpeedOnStraight());
                }
            }else{
                // same logic but curve
                if($this->checkMoveToNext($currentBlock, $car->getPosition() + $car->getSpeedOnCurve())){
                    if($currentBlock+1 < 50 && $Track[$currentBlock+1] == 'curve'){
                        $car->setPosition(
                            $car->getPosition() +
                            $car->getSpeedOnCurve());
                    }else{
                        $car->setPosition(($currentBlock+1)*40);
                    }
                }else{
                    $car->setPosition(
                        $car->getPosition() +
                        $car->getSpeedOnCurve());
                }
            }
        }
    }

    function checkMoveToNext($currentBlock,$value): bool {
        if(round($value/40) > $currentBlock){
            return true;
        }
        return false;
    }

    function checkWinner($carList): string {
        foreach ($carList as $car) {
            // get all the cars is arrived when the race is end
            if($car->getPosition() >= 2000){
                $winnerList[] = $car->getName();
            }
        }
        if(count($winnerList) > 1){
            // if there are more then one cars draw a winner
            shuffle($winnerList);
            return $winnerList[0];
        }else{
            return $winnerList[0];
        }
    }
}
