<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VoucherFactory extends Factory
{
    public function definition(): array
    {
        return [
            'code' => strtoupper(fake()->word),
            'discount_percent' => random_int(1, 10) * 10,
            'remaining' => random_int(0, 100),
        ];
    }
}
