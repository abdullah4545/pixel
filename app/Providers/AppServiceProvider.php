<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\About;
use App\Models\Banner;
use App\Models\Service;
use App\Models\PricePlan;
use App\Models\Professional;
use App\Models\Project;
use App\Models\Safety;
use App\Models\Logo;
use App\Models\Review;
use App\Models\BasicInfo;
use App\Models\Information;
use App\Models\Blogpage;

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
        view()->composer('*', function ($view) {
            $banner = Banner::getData();
            $services = Service::getData();
            $pricePlans = PricePlan::getData();
            $professional = Professional::getData();
            $projects = Project::getData();
            $safety = Safety::getData();
            $basicInfo = BasicInfo::getData();
            $logos = Logo::getData();
            $reviews = Review::getData();
            $categories = Category::where('status', 1)->get();

            // static pages
            $privacy_policy = Information::where('key', 'privacy_policy')->first();
            $terms_condition = Information::where('key', 'terms_codition')->first();
            $about = About::getData();
            $blogPages = Blogpage::all();


            $view->with([
                'basicInfo' => $basicInfo,

                'banner' => $banner,
                'about' => $about,
                'services' => $services,
                'pricePlans' => $pricePlans,
                'professional' => $professional,
                'projects' => $projects,
                'safety' => $safety,
                'logos' => $logos,
                'reviews' => $reviews,
                'privacy' => $privacy_policy,
                'terms' => $terms_condition,
                'blogPages' => $blogPages,
                'categories' => $categories,
            ]);
        });
    }
}
