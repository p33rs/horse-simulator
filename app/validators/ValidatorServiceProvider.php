<?php
namespace horse\validators;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider {

    protected $defer = true;

    public function provides()
    {
        return ['horse\Validation'];
    }

    public function register()
    {
        $this->app->bind('horse\Validation', function()
        {
            return new ValidatorLocator();
        });
    }

}