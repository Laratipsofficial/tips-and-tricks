<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => Str::random(50).'.jpg',
            'size' => random_int(10000, 1000000),
        ];
    }

    public function of(Model $model)
    {
        return $this->state(function (array $attributes) use ($model) {
            return [
                'imageable_type' => $model->getMorphClass(),
                'imageable_id' => $model->getKey(),
            ];
        });
    }
}
