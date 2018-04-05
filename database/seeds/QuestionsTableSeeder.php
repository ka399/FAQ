<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seeded to seed questions with relationship with user.
        $users = App\User::all();
        $users->each(function ($user){
            $question = factory(\App\Question::class)->make();
            $question->user()->associate($user);
            $question->save();
        });
    }
}
