<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $lastname = ["Trần", "Nguyễn", "Lê", "Phan", "Phạm", "Võ"];
        $surname = ["Duy", "Văn", "Huy", "Minh", "Quốc", "Công"];
        $firstname = ["Long", "Hùng", "Hoàng", "Trường", "Đạt", "Bảo"];
        $sourceDir = public_path().'/upload/files/users';
        $targetDir = public_path().'/upload/images/profile';
        return [
            // 'name' => fake()->name(),
            'name' => fake()->randomElement($lastname)
                    .' '.fake()->randomElement($surname)
                    .' '.fake()->randomElement($firstname),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->e164PhoneNumber(),
            'avatar' => '/upload/images/profile/'.fake()->file($sourceDir, $targetDir, false),
            'address' => fake()->address(),
            'role' => fake()->boolean(),
            'active' => fake()->boolean(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
