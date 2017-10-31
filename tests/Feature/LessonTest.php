<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LessonTest extends TestCase
{
    use RefreshDatabase;

    protected $lesson;

    public function setUp()
    {
        parent::setUp();

        $this->lesson = factory('App\Lesson')->create();
    }

    public function test_it_fetches_lessons()
    {
        $this->getJson('api/lessons');
    }

    public function test_it_fetches_a_single_lesson()
    {
        $this->make('Lesson');
        $lesson = $this->getJson('api/lessons1')->data;
    }

    public function test_it_404s_if_a_lesson_is_not_found()
    {
        $json = $this->getJson('api/lessons/x');
    }

    public function test_it_creates_a_new_lesson_given_valid_parameters()
    {
        $this->getJson('api/lessons', 'POST', $this->getStub());
    }

    public function test_it_throws_a_422_if_a_new_lesson_request_fails_validation()
    {
        $this->getJson('api/lessons', 'POST');
    }
}
