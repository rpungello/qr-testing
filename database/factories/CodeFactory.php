<?php

namespace Database\Factories;

use App\Models\Code;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CodeFactory extends Factory
{
    protected $model = Code::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'data' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'resource_id' => Resource::factory(),
        ];
    }

    public function forProject(Resource $resource): self
    {
        return $this->state(fn (array $attributes) => [
            'resource_id' => $resource->getKey(),
        ]);
    }
}
