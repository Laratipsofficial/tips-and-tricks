<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
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

        Blade::directive('route', function ($expression) {
            return "<?php echo route($expression); ?>";
        });

        Relation::enforceMorphMap([
            'post' => Post::class,
            'video' => Video::class,
        ]);

        Model::preventLazyLoading(! $this->app->isProduction());
    }
}
