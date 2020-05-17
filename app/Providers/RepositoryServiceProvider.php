<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);                             //:end-bindings:
        $this->app->bind(\App\Repositories\SettingRepository::class, \App\Repositories\SettingRepositoryEloquent::class);                       //:end-bindings:
        $this->app->bind(\App\Repositories\LanguageRepository::class, \App\Repositories\LanguageRepositoryEloquent::class);                     //:end-bindings:
        $this->app->bind(\App\Repositories\PageRepository::class, \App\Repositories\PageRepositoryEloquent::class);                             //:end-bindings:
        $this->app->bind(\App\Repositories\PageTranslationRepository::class, \App\Repositories\PageTranslationRepositoryEloquent::class);       //:end-bindings:
        $this->app->bind(\App\Repositories\PostRepository::class, \App\Repositories\PostRepositoryEloquent::class);                             //:end-bindings:
        $this->app->bind(\App\Repositories\PostTranslationRepository::class, \App\Repositories\PostTranslationRepositoryEloquent::class);       //:end-bindings:
        $this->app->bind(\App\Repositories\BlockRepository::class, \App\Repositories\BlockRepositoryEloquent::class);                           //:end-bindings:
        $this->app->bind(\App\Repositories\BlockTranslationRepository::class, \App\Repositories\BlockTranslationRepositoryEloquent::class);     //:end-bindings:
    }
}
