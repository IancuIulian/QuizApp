<?php
declare(strict_types=1);


interface QuestionCollectionInterface
{
    public function addQuestion(Question $question);

    public function getPositionQuestion(int $pos): Question;

    public function getAllQuestions(): array;

    public function isEmpty(): bool;
}