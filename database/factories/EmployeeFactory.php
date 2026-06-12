<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_karyawan' => fake()->name(),
            'niy' => 'EMP' . fake()->unique()->numberBetween(1000, 9999),
            'position_id' => fake()->numberBetween(1, 3),
            'gaji_pokok' => fake()->numberBetween(5000000, 15000000),
            'status_aktif' => true,
        ];
    }
}
