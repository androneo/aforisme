<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\Aforism;
use DB;
use Conner\Tagging\Model\Tag as Tag;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeFavorites();
        $this->composeTags();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Give the view an array with aforisms favorited by logged user
     *
     * @return void
     */
    private function composeFavorites()
    {
        view()->composer('layouts.master', function($view)
        {
            if (Auth::check()) {
                $favorites = DB::table('likeable_likes')->whereUserId(Auth::user()->id)->lists('likable_id');
                // $favorites = array_flatten(Aforism::whereLiked(Auth::user()->id)->get(['id'])->toArray());
                // dd($favorites);
                $view->with('favorites', $favorites);
            }
        });
    }

    /**
     * Give to the index view an array with tags and the number of aforisms in every tag
     *
     * @return void
     */
    private function composeTags()
    {
        view()->composer('aforism.index', function($view){

            // $headTags = Tag::join('aforisms', 'aforisms.tag_id', '=', 'tags.id')
            //             ->groupBy('tags.id')
            //             ->get(['tags.tag', DB::raw('count(aforisms.id) as aforisms')]);
            $headTags = Tag::all();

            $view->with('headTags', $headTags);

        });
    }
}
