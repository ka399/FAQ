<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    /**
     * Unit test to check if profile comes back as an object
     *
     * @return void
     */
    public function testProfile()
    {
        $user = factory(\App\User::class)->make();
        $this->assertTrue(is_object($user->profile()->get()));
    }

    /**
     * Unit Test to check if Users are saved.
     *
     * @return void
     */
    public function testSave()
    {
        $user = factory(\App\User::class)->make();
        $this->assertTrue($user->save());
    }

    /**
     * Unit test to check if question comes back as an object
     *
     * @return void
     */
    public function testQuestions()
    {
        $user = factory(\App\User::class)->make();
        $this->assertTrue(is_object($user->questions()->get()));
    }
}
