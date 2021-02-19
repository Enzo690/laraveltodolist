<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(2),
            'email' => $this->faker->email,
            'job_title' => $this->faker->jobTitle,
            'country_id' => $this->faker->numberBetween(1,10),
            'city_id' => $this->faker->numberBetween(1,10),
        ];
    }
}
