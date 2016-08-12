<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testPostList()
    {
        // authenticate user for testing
        $user = new User(array('name' => 'Sokly'));
        $this->be($user);
        $this->get(route('posts.index'))
             ->assertResponseOK();

    }
}
