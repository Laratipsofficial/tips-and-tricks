<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\Role;
use App\Models\Shop;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Model::unguard();

        App::macro('isStaging', function () {
            return config('app.env') === 'staging';
        });

        Blade::directive('route', function ($expression) {
            return "<?php echo route($expression); ?>";
        });

        Relation::enforceMorphMap([
            'article' => Article::class,
            'category' => Category::class,
            'comment' => Comment::class,
            'image' => Image::class,
            'post' => Post::class,
            'role' => Role::class,
            'shop' => Shop::class,
            'user' => User::class,
            'video' => Video::class,
        ]);

        Model::preventLazyLoading(! $this->app->isProduction());

        // Blade::anonymousComponentNamespace(
        //     'admin/components',
        //     'admin'
        // );

        Builder::macro('toRawSql', function () {
            dd(
                vsprintf(
                    str_replace(['?'], ['%s'], $this->toSql()),
                    array_map(
                        fn ($item) => is_numeric($item) ? $item : "'{$item}'",
                        $this->getBindings()
                    )
                )
            );
        });

        // URL::setKeyResolver(fn () => 'your_key_here');
    }
}
