<?php
declare(strict_types=1);

class AnswerCollection implements \Iterator
{
    protected $answers = [];

    /**
     * The position is stored to help with the Iterator methods implementation
     *
     * @var int
     */
    protected $position = 0;

    public function __construct(array $answers)
    {
        $this->answers = $answers;
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current(): Answer
    {
        return $this->answers[$this->position];
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
        return (isset($this->answers[$this->position]));
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


    public function addAnswer(Answer $answer)
    {
        $this->answers[] = $answer;
    }

    public function getAllAnswers(): array
    {
        return $this->answers;
    }

    public function getCurrentAnswer() : Answer
    {
        return $this->answers[$this->position];
    }

    public function isEmpty(): bool
    {
        return empty($this->answers);
    }
}