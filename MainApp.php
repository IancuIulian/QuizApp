<?php
declare(strict_types=1);


require_once 'Util/UserInteraction.php';
require_once 'User/User.php';
require_once 'Quiz/Quiz.php';
require_once 'Quiz/Question.php';
require_once 'Quiz/Answer.php';
require_once 'Quiz/QuestionCollection.php';
require_once 'Quiz/AnswerCollection.php';
require_once 'QuizScorer.php';


function main()
{
    echo PHP_EOL . "Starting app..." . PHP_EOL;
    echo "Enter email address: ";

    $user = new User(askForInput());
    echo $user;

    $quizArray = [
        'Quiz 1 - Math test',
        'Quiz 2',
        'Quiz 3',
    ];

    $answerCollection1 = new AnswerCollection([new Answer('2')]);
    $answerCollection2 = new AnswerCollection([new Answer('4')]);
    $answerCollection3 = new AnswerCollection([new Answer('7')]);

    $question1 = new Question('1 + 1 = ', 10, $answerCollection1);
    $question2 = new Question('2 + 2 = ', 10, $answerCollection2);
    $question3 = new Question('4 + 3 = ', 20, $answerCollection3);

    $questionCollection = new QuestionCollection([$question1, $question2, $question3]);


    echo "Available quizzes:" . PHP_EOL;
    foreach ($quizArray as $key => $quizOption) {
        echo ($key + 1) . '. ' . $quizOption . PHP_EOL;
    }

    echo "Choose number (in vain): ";
    $chosenQuiz = askForInput();
    $chosenQuiz = 1;

    echo PHP_EOL . "Your choice: " . $chosenQuiz;
    $quiz     = new Quiz($chosenQuiz, $questionCollection);
    $userQuiz = clone $quiz;

    $questions = $quiz->getQuestionCollection();
    foreach ($questions as $questionNumber => $question) {
        echo PHP_EOL . 'Question ' . ($questionNumber + 1) . ': ' . PHP_EOL;
        echo $question;

        $answer = askForInput();
        $userQuiz->getQuestionCollection()->getPositionQuestion($questionNumber)->setAnswerCollection(new AnswerCollection([new Answer($answer)]));
    }

    $quizScorer = new QuizScorer($quiz, $userQuiz);
    $quizScorer->calculateScore();
    $quizScorer->printScore();
}
