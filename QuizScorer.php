<?php
declare(strict_types=1);

class QuizScorer
{
    protected $quiz;
    protected $userQuiz;
    protected $score = 0;

    public function __construct(Quiz $quiz, Quiz $userQuiz)
    {
        $this->quiz     = $quiz;
        $this->userQuiz = $userQuiz;
    }

    public function calculateScore(): int
    {
        $quizQuestions     = $this->quiz->getQuestionCollection()->getAllQuestions();
        $userQuizQuestions = $this->userQuiz->getQuestionCollection()->getAllQuestions();

        foreach ($userQuizQuestions as $questionNumber => $question) {
            $userAnswers    = $question->getAnswerCollection()->getAllAnswers();
            $correctAnswers = $quizQuestions[$questionNumber]->getAnswerCollection()->getAllAnswers();

            $allCorrect = true;
            foreach ($userAnswers as $userAnswer) {
                $foundAnswer = false;
                foreach ($correctAnswers as $correctAnswer) {
                    if ($userAnswer->getText() === $correctAnswer->getText()) {
                        $foundAnswer = true;
                    }
                }
                if (!$foundAnswer) {
                    $allCorrect = false;
                }
            }
            if ($allCorrect) {
                $this->score += $question->getScore();
            }
        }
        return $this->score;
    }

    public function printScore()
    {
        echo "Score: {$this->score}/{$this->quiz->getQuizScore()}" . PHP_EOL;
    }

}