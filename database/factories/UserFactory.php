<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Default password, you may want to change this
            'mobile_number' => $this->faker->phoneNumber,
            'description' => $this->faker->sentence,
            'avatar' => $this->faker->imageUrl(),
            'vendor_type' => $this->faker->word,
            'is_approved' => $this->faker->boolean,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'role' => 'vendor',
            'remember_token' => Str::random(10),
            // 'address' => [
            //     'street' => $this->faker->streetAddress,
            //     'city' => $this->faker->city,
            //     'state' => $this->faker->state,
            //     'zip_code' => $this->faker->postcode,
            //     'country' => $this->faker->country,
            //     'phone' => $this->faker->phoneNumber,
            // ],

            // 'name' => $this->faker->name(),
            // 'email' => $this->faker->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'remember_token' => Str::random(10),
        ];
    }


    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
