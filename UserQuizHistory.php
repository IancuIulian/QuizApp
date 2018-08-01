<?php
declare(strict_types = 1);

class UserQuizHistory
{
    protected $userId;
    protected $quizId;
    protected $score;

    public function __construct(int $userId, int $quizId, int $score)
    {
        $this->userId = $userId;
        $this->quizId = $quizId;
        $this->score  = $score;
    }

    public function setScore(int $score){
        $this->score = $score;
    }

    public function getScore(){
        return $this->score;
    }
}