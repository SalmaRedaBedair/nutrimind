<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{


    protected $model = Doctor::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone' => fake()->phoneNumber(),
            'image' => fake()->image,
            'gender' => fake()->randomElement(['male', 'female']),
            'qualification' => fake()->sentence(10),
            'national_id' => fake()->phoneNumber(),
            'experience_years' => fake()->randomElement([1,2,3,4,5]),
            'rate' => fake()->randomElement([1,2,3,4,5]),
            'verfication_code' => fake()->randomElement([1025,5592,2173,4687,4255]),
            'credit_card_number' => fake()->phoneNumber(),
        ];
    }
}
