<?php
namespace App\Http\Repository;
use App\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\database\Eloquent;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use App;

/**
 * Question Repository class
 */
class QuestionRepository
{
    /**
     * Get a list of all archived question : month & counts
     *
     * @return array  Array containing list of all question archives : Month.Year ->(Count)
     */
    public function getArchivesList()
    {
        $archives = Question::ArchiveStats();

        return $archives;
    }

    /**
     * Get a list of questions : ALL or by Month/year from archives based on condition.
     *
     * @return array  Array containing list of all questions
     */
    public function getQuestionsList()
    {
        $questions = Question::FilterQuestions();

        return $questions;
    }




}