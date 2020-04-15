<?php
/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/27/2018
 * Time: 6:20 PM
 */
const LOVE = 0;
const FIFTEEN = 1;
const THIRTY = 2;
const FORTY = 3;
class TennisGame
{

    public $result = '';

    public function getResult($Player1Score, $Player2Score)
    {
        $isTie = ($Player1Score == $Player2Score);
        if ($isTie) {
            switch ($Player1Score) {
                case LOVE:
                    $this->result = "Love-All";
                    break;
                case FIFTEEN:
                    $this->result = "Fifteen-All";
                    break;
                case THIRTY:
                    $this->result = "Thirty-All";
                    break;
                case FORTY:
                    $this->result = "Forty-All";
                    break;
                default:
                    $this->result = "Deuce";
                    break;

            }
        } else {
            $hasWinner = ($Player1Score >= 4 || $Player2Score >= 4);
            if ($hasWinner) {
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
                        case LOVE:
                            $this->result .= "Love";
                            break;
                        case FIFTEEN:
                            $this->result .= "Fifteen";
                            break;
                        case THIRTY:
                            $this->result .= "Thirty";
                            break;
                        case FORTY:
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