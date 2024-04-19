<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Contact::class;

    public function definition()
    {
        $category_id = Category::inRandomOrder()->limit(5)->pluck('id')->first();

        return [
            'last_name' => $this->faker->lastName,
            'first_name' =>$this->faker->firstName,
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'email' => $this->faker->unique()->safeEmail,
            'tell' => $this->faker->numerify('###########'),
            'address' => $this->faker->address,
            'building' => $this->faker->optional()->buildingNumber,
            'category_id' => $category_id,
            'detail' => $this->faker->text(120),
        ];
    }
}
