<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VisitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_visit_is_recorded()
    {
        $visit = factory('App\Visit')->create();

        $utm_term = $visit['utm_term'];

        $url = '/?utm_source=example.com&utm_term=' . $utm_term;

        $this->get($url)->assertStatus(200);

        $this->assertDatabaseHas('visits', ['utm_term' => $utm_term]);
    }
}
