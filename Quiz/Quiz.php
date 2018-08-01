<?php
declare(strict_types=1);

class Quiz
{
    protected $id;
    protected $questionCollection;

    public function __construct(int $id, QuestionCollection $questionCollection)
    {
        $this->id                 = $id;
        $this->questionCollection = $questionCollection;
    }

    public function getQuestionCollection(): QuestionCollection
    {
        return $this->questionCollection;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getQuizScore(): int
    {
        $totalScore = 0;
        foreach ($this->questionCollection->getAllQuestions() as $question) {
            $totalScore += $question->getScore();
        }
        return $totalScore;
    }


    public function __clone()
    {
        foreach ($this as $key => $val) {
            if (is_object($val) || (is_array($val))) {
                $this->{$key} = unserialize(serialize($val));
            }
        }
    }

}