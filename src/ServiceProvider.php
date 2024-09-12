<?php

namespace Giosf\FormBuilder;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{

	public function boot(): void
	{
		$this->loadViewsFrom(__DIR__.'/resources/views/', 'form-builder');
	}

}
