<?php

namespace Tests\Unit;

use App\TodoMirror;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoMirrorTest extends TestCase
{
    use WithFaker,RefreshDatabase;

    /** @test */
    public function todo_mirror_has_attribute()
    {
        $todoMirror = create(TodoMirror::class, [
            'name' => $name = $this->faker->text(50),
            'description' => $description = $this->faker->text(100)
        ]);

        $this->assertEquals($todoMirror->name, $name);
        $this->assertEquals($todoMirror->description, $description);
    }
}
