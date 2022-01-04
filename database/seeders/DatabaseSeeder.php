<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        Category::factory()
            ->times(2)
            ->create(['parent_id' => null])
            ->each(
                fn (Category $category) => Category::factory()
                    ->times(2)
                    ->create(['parent_id' => $category->id])
                    ->each(
                        fn (Category $category) => Category::factory()
                            ->times(2)
                            ->create(['parent_id' => $category->id])
                            ->each(
                                fn (Category $category) => Category::factory()
                                    ->times(2)
                                    ->create(['parent_id' => $category->id])
                            )
                    )
            );
    }
}
