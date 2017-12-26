<?php namespace Modules\Course\Providers;

use Illuminate\Support\ServiceProvider;

class CourseServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Boot the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerTranslations();
		$this->registerConfig();
		$this->registerViews();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('Modules\Course\Repositories\CategoryRepository','Modules\Course\Repositories\CategoryRepositoryEloquent');
		$this->app->bind('Modules\Course\Repositories\BusinessRepository','Modules\Course\Repositories\BusinessRepositoryEloquent');
		$this->app->bind('Modules\Course\Repositories\CourseRepository','Modules\Course\Repositories\CourseRepositoryEloquent');
		$this->app->bind('Modules\Course\Repositories\ModuleRepository','Modules\Course\Repositories\ModuleRepositoryEloquent');
		$this->app->bind('Modules\Course\Repositories\FileRepository','Modules\Course\Repositories\FileRepositoryEloquent');
	}

	/**
	 * Register config.
	 *
	 * @return void
	 */
	protected function registerConfig()
	{
		$this->publishes([
		    __DIR__.'/../Config/config.php' => config_path('course.php'),
		]);
		$this->mergeConfigFrom(
		    __DIR__.'/../Config/config.php', 'course'
		);
	}

	/**
	 * Register views.
	 *
	 * @return void
	 */
	public function registerViews()
	{
		$viewPath = base_path('resources/views/modules/course');

		$sourcePath = __DIR__.'/../Resources/views';

		$this->publishes([
			$sourcePath => $viewPath
		]);

		$this->loadViewsFrom(array_merge(array_map(function ($path) {
			return $path . '/modules/course';
		}, \Config::get('view.paths')), [$sourcePath]), 'course');
	}

	/**
	 * Register translations.
	 *
	 * @return void
	 */
	public function registerTranslations()
	{
		$langPath = base_path('resources/lang/modules/course');

		if (is_dir($langPath)) {
			$this->loadTranslationsFrom($langPath, 'course');
		} else {
			$this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'course');
		}
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
