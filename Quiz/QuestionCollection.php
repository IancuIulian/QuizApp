<?php
declare(strict_types=1);

require_once 'QuestionCollectionInterface.php';

class QuestionCollection implements QuestionCollectionInterface, \Iterator
{
    protected $questions = [];


    /**
     * The position is stored to help with the Iterator methods implementation
     *
     * @var int
     */
    protected $position = 0;

    public function __construct(array $questions)
    {
        $this->questions = $questions;
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current(): Question
    {
        return $this->questions[$this->position];
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        $this->position++;
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid(): bool
    {
        return (isset($this->questions[$this->position]));
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->position = 0;
    }


    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;
    }

    public function getPositionQuestion(int $pos): Question
    {
        return $this->questions[$pos];
    }

    public function getAllQuestions(): array
    {
        return $this->questions;
    }

    public function isEmpty(): bool
    {
        return empty($this->questions);
    }
}