<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Login;
use App\Models\Post;
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
            // ->has(
            //     Post::factory()
            //         ->hasComments(3)
            //         ->count(3),
            //     'posts'
            // )
            ->create()
            ->each(
                fn (User $user) => Login::factory()
                    ->times(random_int(1, 9))
                    ->create(['user_id' => $user->id])
            );

        // User::factory()
        //     ->hasPosts(9000, [
        //         'published_at' => '2022-07-01',
        //     ])
        //     ->hasPosts(8000, [
        //         'published_at' => '2022-08-01',
        //     ])
        //     ->hasPosts(10000, [
        //         'published_at' => '2022-09-01',
        //     ])
        //     ->hasPosts(10200, [
        //         'published_at' => '2022-10-01',
        //     ])
        //     ->create();

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
