<?php

namespace Tests\Unit;

use App\Todo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoTest extends TestCase
{
    use WithFaker,RefreshDatabase;

    /** @test */
    public function todo_has_attribute()
    {
        $todo = create(Todo::class, [
            'name' => $name = $this->faker->text(50),
            'description' => $description = $this->faker->text(100)
        ]);

        $this->assertEquals($todo->name, $name);
        $this->assertEquals($todo->description, $description);
    }
}
