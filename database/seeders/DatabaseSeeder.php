<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Login;
use App\Models\Role;
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
        User::factory(10)
            ->create()
            ->each(
                fn (User $user) => Login::factory()
                    ->times(random_int(2, 4))
                    ->create(['user_id' => $user->id])
            );

        Role::factory()
            ->times(3)
            ->create();

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
