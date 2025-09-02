<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ResourceFactory extends Factory
{
    protected $model = Resource::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'project_id' => Project::factory(),
        ];
    }

    public function forProject(Project $project): self
    {
        return $this->state(fn (array $attributes) => [
            'project_id' => $project->getKey(),
        ]);
    }
}
