<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Item;
use App\Role;
use App\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Support\Facades\URL;
use Laravelista\Comments\Comment;

class PagesController extends Controller
{

    public function index()
    {
        $settings = app('site_global_settings');

        /**
         * Start SEO
         */
        SEOMeta::setTitle(__('seo.backend.admin.index', ['site_name' => empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name]));
        SEOMeta::setDescription('');
        SEOMeta::setCanonical(URL::current());
        SEOMeta::addKeyword($settings->setting_site_seo_home_keywords);
        /**
         * End SEO
         */

        $admin_user = User::getAdmin();

        $category_count = Category::all()->count();
        $item_count = Item::where('country_id', $settings->setting_site_location_country_id)->count();
        $post_count = \Canvas\Post::published()->get()->count();
        $user_count = User::where('role_id', Role::USER_ROLE_ID)->get()->count();

        $recent_threads = Thread::forUser($admin_user->id)->latest('updated_at')->take(5)->get();
        $recent_comments = Comment::orderBy('created_at', 'DESC')->take(5)->get();

        return response()->view('backend.admin.index',
            compact('category_count', 'item_count', 'post_count', 'user_count',
                'recent_threads', 'recent_comments'));
    }
}
