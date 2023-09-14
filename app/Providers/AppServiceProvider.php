<?php

namespace App\Providers;

use App\Models\SliderImage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $page_property_view = \App\Models\PageProperty::first();
        if($page_property_view){
            if($page_property_view->client_feedbacks != null){
                $page_property_view->client_feedbacks = json_decode($page_property_view->client_feedbacks);
            }
            $page_property_view->slider_images = SliderImage::all();
            
            View::share('page_property_view', $page_property_view);
        }
        
    }
}
