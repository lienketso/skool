<?php


namespace Frontend\Providers;


use Barryvdh\Debugbar\ServiceProvider;
use Base\Supports\Helper;
use Category\Repositories\CategoryRepository;
use Groups\Models\Groups;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Menu\Models\Menu;
use Menu\Repositories\MenuRepository;
use Post\Repositories\PostRepository;
use Product\Repositories\CatproductRepository;
use Product\Repositories\ProductRepository;
use Setting\Repositories\SettingRepositories;

class ModuleProvider extends \Illuminate\Support\ServiceProvider
{
    protected $lang;
    public function boot(MenuRepository $menuRepository,
                         SettingRepositories $settingRepositories,
                         PostRepository $postRepository,
                         CatproductRepository $catproductRepository,
        CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views','frontend');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        \view()->composer('frontend::*',function ($views) use($settingRepositories, $postRepository,$catproductRepository, $categoryRepository){
            //setting all page
            if(!$views->offsetExists('setting')){
                $setting = $settingRepositories->getAllSetting();
                $lang = \session('lang');
                $views->with(['setting'=>$setting,'lang'=>$lang]);
            }
            //page footer
            if(!$views->offsetExists('pageFoot')){
                $pageFoot = $postRepository->getPageFoot();
                $views->with(['pageFoot'=>$pageFoot]);
            }

            //catnews footer
            if(!$views->offsetExists('catNewsFoot')){
                $catNewsFoot = $categoryRepository->getCatFoot();
                $views->with(['catNewsFoot'=>$catNewsFoot]);
            }
            if(!$views->offsetExists('latest')){
                //bài viết mới
                $latest = $postRepository->getLatestPost();
                $views->with(['latest'=>$latest]);
            }

        });
    }

    public function register()
    {
        Helper::loadModuleHelpers(__DIR__);
        $this->app->register(RouteProvider::class);
    }
}
