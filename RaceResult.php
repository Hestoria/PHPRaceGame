<?php

class RaceResult{
    /**
     * @var array a list of round results
     * @var string winner car
     */
    private $roundResults = [];
    private $winner;

    public function getRoundResults(): array
    {
        return $this->roundResults;
    }

    // code added after this line ---
    public function pushRoundResults($roundResults){
        $this->roundResults[] = $roundResults;
    }

    public function setWinner($winner){
        $this->winner = $winner;
    }

    public function getWinner(){
        return $this->winner;
    }
}
