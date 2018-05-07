<?php

namespace Tests\Unit;

use App\Question;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionTest extends TestCase
{
    /**
     *if questions and users are saved as per the relationship
     *
     * @return void
     */
    public function testSave()
    {
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $this->assertTrue($question->save());
    }

    /**
     *if questions and users are updated as per the relationship
     *
     * @return void
     */
    public function testUpdate()
    {
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $question->save();
        $question1 = Question::find($question->id)->first();
        $question1->title ='test title';
        $this->assertTrue($question1->save());
    }

    public function testdelete()
    {
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $question->save();
        $question1 = Question::find($question->id)->first();
        $this->assertTrue($question1->delete());
    }

    public function testRetrieve()
    {
        $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $question->title ="new title for test";
        $question->save();
        $this->assertTrue(Question::find($question->id)->title == "new title for test");

    }
}
