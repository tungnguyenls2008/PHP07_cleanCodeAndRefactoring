<?php
/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/27/2018
 * Time: 6:20 PM
 */

class TennisGame
{
    public $result = '';

    public function getResult($Player1Score, $Player2Score)
    {

        if ($Player1Score == $Player2Score) {
            switch ($Player1Score) {
                case 0:
                    $this->result = "Love-All";
                    break;
                case 1:
                    $this->result = "Fifteen-All";
                    break;
                case 2:
                    $this->result = "Thirty-All";
                    break;
                case 3:
                    $this->result = "Forty-All";
                    break;
                default:
                    $this->result = "Deuce";
                    break;

            }
        } else {
            if ($Player1Score >= 4 || $Player2Score >= 4) {
                $minusResult = $Player1Score - $Player2Score;
                if ($minusResult == 1) {
                    $this->result = "Advantage player1";
                } else {
                    if ($minusResult == -1) {
                        $this->result = "Advantage player2";
                    } else {
                        if ($minusResult >= 2) {
                            $this->result = "Win for player1";
                        } else {
                            $this->result = "Win for player2";
                        }
                    }
                }
            } else {
                for ($i = 1; $i < 3; $i++) {
                    if ($i == 1) {
                        $tempScore = $Player1Score;
                    } else {
                        $this->result .= "-";
                        $tempScore = $Player2Score;
                    }
                    switch ($tempScore) {
                        case 0:
                            $this->result .= "Love";
                            break;
                        case 1:
                            $this->result .= "Fifteen";
                            break;
                        case 2:
                            $this->result .= "Thirty";
                            break;
                        case 3:
                            $this->result .= "Forty";
                            break;
                    }
                }
            }
        }
    }

    public function __toString()
    {
        return $this->result;
    }
}