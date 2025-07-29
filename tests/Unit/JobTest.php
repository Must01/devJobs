<?php

namespace Tests\Unit;

use App\Models\Employer;
use App\Models\Job;

// TestCase - base class for all Laravel tests, provides testing framework functionality
use Tests\TestCase;

// RefreshDatabase trait - provides automatic database cleanup between tests
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_belongs_to_an_employer(): void
    {
        // Arrange
        $employer = Employer::factory()->create();
        $job = Job::factory()->create([
            'employer_id' => $employer->id
        ]);
        // Act & Assert
        $relatedEmployer = $job->employer;
        $this->assertTrue($relatedEmployer->is($employer));
    }


    public function test_can_have_tags(): void
    {
        // AAA
        // arrange
        $job = Job::factory()->create();

        // act
        $job->tag('frontend');

        // assert
        $this->assertCount(1, $job->tags); // Asserts that the 'tags' collection has 1 item
    }
}
