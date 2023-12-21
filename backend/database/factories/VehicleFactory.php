<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $vehicle = $this->fakeVehicle();

        return [
            'license_plate' => $this->fakeLicensePlate(),
            'brand' => $vehicle['brand'],
            'model' => $vehicle['model'],
            'year' => rand(2010, 2023),
            'color' => Arr::random(['Gri', 'Beyaz', 'Siyah']),
            'engine' => Arr::random(['1.3', '1.6', '1.8', '2.0', '2.5']),
            'fuel' => Arr::random(['Dizel', 'Benzin']),
            'transmission' => Arr::random(['Manuel', 'Otomatik']),
        ];
    }

    private function fakeLicensePlate(): string
    {
        $char1 = Arr::random(range('A', 'Z'));
        $char2 = Arr::random(range('A', 'Z'));
        $suffix = rand(100, 999);

        return "34 $char1$char2 $suffix";
    }

    private function fakeVehicle(): array
    {
        $options = [
            'Fiat' => ['Egea', 'Egea Cross'],
            'Toyota' => ['Corolla', 'Yaris'],
            'Renault' => ['Clio', 'Megane'],
            'Honda' => ['Civic'],
            'Dacia' => ['Duster', 'Sandero'],
            'Volkswagen' => ['Passat', 'Polo'],
            'Hyundai' => ['i20', 'Accent Blue'],
        ];

        $brand = array_rand($options);
        $model = Arr::random($options[$brand]);

        return [
            'brand' => $brand,
            'model' => $model,
        ];
    }
}
