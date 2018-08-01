<?php
declare(strict_types=1);

class Question
{
    protected $id;
    protected $text;
    protected $score;
    protected $answerCollection;

    public function __construct(string $text, int $score, AnswerCollection $answerCollection)
    {
        $this->text             = $text;
        $this->score            = $score;
        $this->answerCollection = $answerCollection;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function setScore(int $score)
    {
        $this->score = $score;
    }

    public function getText(): string
    {
        return $this->text;
    }


    public function getAnswerCollection(): AnswerCollection
    {
        return $this->answerCollection;
    }

    public function setAnswerCollection(AnswerCollection $answerCollection)
    {
        $this->answerCollection = $answerCollection;
    }

    public function __toString()
    {
        return $this->getText() . ' ';
    }

}