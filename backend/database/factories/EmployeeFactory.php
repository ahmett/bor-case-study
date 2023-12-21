<?php

namespace Database\Factories;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
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
        $person = $this->fakePerson();

        return [
            'gov_id' => fake()->tcNo(),
            'name' => $person['name'],
            'surname' => fake()->lastName(),
            'birthdate' => fake()->date(max: '-25 years'),
            'gender' => $person['gender'],
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'department' => Arr::random([
                'Engineering',
                'Design',
                'Finance',
                'Human Resources',
                'Marketing',
                'Operations',
                'Quality Assurance',
                'Sales',
            ]),
        ];
    }

    private function fakePerson()
    {
        return Arr::random([
            [
                'name' => fake()->firstNameMale(),
                'gender' => Gender::Male,
            ],
            [
                'name' => fake()->firstNameFemale(),
                'gender' => Gender::Female,
            ],
        ]);
    }
}
