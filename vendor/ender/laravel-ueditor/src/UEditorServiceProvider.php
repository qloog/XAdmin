<?php namespace Ender\UEditor;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class UEditorServiceProvider extends LaravelServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {

        $this->handleConfigs();
        // $this->handleMigrations();
        $this->handleViews();
        $this->handleTranslations();
        $this->handleRoutes();
        $this->handleRecources();

        //根据系统配置 取得 local
        $locale = config('app.locale');
        $ueditor_locale=config('ueditor.langMap.'.$locale);
        $file = public_path()."/ueditor/lang/$ueditor_locale/$ueditor_locale.js";

        if (!\File::exists($file)) {
            //Default is zh-cn
            $file = public_path()."/ueditor/lang/zh-cn/zh-cn.js";
        }
        view()->share('ueditor_locale', $ueditor_locale);
        view()->share('ueditor_locale_file', $file);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        // Bind any implementations.

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {

        return [];
    }

    private function handleConfigs() {

        $configPath = __DIR__ . '/../config/ueditor.php';

        $this->publishes([$configPath => config_path('ueditor.php')],'config');

        $this->mergeConfigFrom($configPath, 'ueditor');
    }

    private function handleTranslations() {

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'ueditor');

        $this->publishes([__DIR__.'/../lang' => base_path('/resources/lang/')],'lang');
    }

    private function handleViews() {

        $this->loadViewsFrom(__DIR__.'/../views','ueditor');

        $this->publishes([__DIR__.'/../views' => base_path('resources/views/ueditor')],'view');
    }

    private function handleMigrations() {

        $this->publishes([__DIR__ . '/../migrations' => base_path('database/migrations')],'migration');
    }

    private function handleRoutes() {

        include __DIR__.'/../routes.php';
    }

    private function handleRecources(){

        $this->publishes([
            __DIR__ . '/../resources/public/dialogs/' => public_path('ueditor/dialogs')
        ],'dialog');

        $this->publishes([
            __DIR__ . '/../resources/public/lang/' => public_path('ueditor/lang')
        ],'lang');

        $this->publishes([
            __DIR__ . '/../resources/public/themes/' => public_path('ueditor/themes')
        ],'theme');

        $this->publishes([
            __DIR__ . '/../resources/public/third-party/' => public_path('ueditor/third-party')
        ],'third-party');

        $this->publishes([
            __DIR__ . '/../resources/public/ueditor.all.js' => public_path('ueditor/ueditor.all.js'),
            __DIR__ . '/../resources/public/ueditor.all.min.js' => public_path('ueditor/ueditor.all.min.js'),
            __DIR__ . '/../resources/public/ueditor.config.js' => public_path('ueditor/ueditor.config.js'),
            __DIR__ . '/../resources/public/ueditor.parse.js' => public_path('ueditor/ueditor.parse.js'),
            __DIR__ . '/../resources/public/ueditor.parse.min.js' => public_path('ueditor/ueditor.parse.min.js')
        ],'js');
    }
}
