<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Laravelista\Comments\Commenter;
use Cmgmyr\Messenger\Traits\Messagable;
use DateTime;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Commenter, Messagable;

    const USER_NOT_SUSPENDED = 0;
    const USER_SUSPENDED = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'role_id',
        'user_image',
        'user_about',
        'user_suspended',
        'user_prefer_language',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function hasRole()
    {
        return $this->role->name;
    }

    public function isAdmin()
    {
        return $this->role_id == Role::ADMIN_ROLE_ID;
    }

    public function isUser()
    {
        return $this->role_id == Role::USER_ROLE_ID;
    }

    public function hasSuspended()
    {
        return $this->user_suspended == User::USER_SUSPENDED;
    }

    public function hasActive()
    {
        return $this->user_suspended == User::USER_NOT_SUSPENDED;
    }

    /**
     * Get the product attributes for the user.
     */
    public function attributes()
    {
        return $this->hasMany('App\Attribute');
    }

    /**
     * Get the products for the user.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    /**
     * Get the items for the user.
     */
    public function items()
    {
        return $this->hasMany('App\Item');
    }

    public function socialiteAccounts()
    {
        return $this->hasMany('App\SocialiteAccount');
    }

    /**
     * Get the claims of this user
     * @return HasMany
     */
    public function claims()
    {
        return $this->hasMany('App\ItemClaim');
    }

    /**
     * Get the items saved by this user
     */
    public function savedItems()
    {
        return $this->belongsToMany('App\Item')->withTimestamps();
    }

    public function hasSavedItem(int $item_id)
    {
        return DB::table('item_user')
            ->where('item_id', $item_id)
            ->where('user_id', $this->id)
            ->get()
            ->count() > 0 ? true : false;
    }

    public function subscription()
    {
        return $this->hasOne('App\Subscription');
    }

    public function hasPaidSubscription()
    {
        $today = new DateTime('now');
        $today = $today->format("Y-m-d");

        $subscription_exist = Subscription::where('user_id', $this->id)
            ->where('subscription_end_date', '>=', $today)->count();

        return $subscription_exist > 0 ? true : false;
    }

    public function subscriptionDaysLeft()
    {
        if($this->hasPaidSubscription())
        {
            $subscription = $this->subscription()->get()->first();

            $subscription_end_date = new DateTime($subscription->subscription_end_date);
            $today = new DateTime('now');

            $days_left = $subscription_end_date->diff($today);

            return intval($days_left->days);
        }
        else
        {
            return 0;
        }
    }

    public function canFeatureItem()
    {
        if($this->hasPaidSubscription())
        {
            $subscription = $this->subscription()->get()->first();
            $allowed_num_featured_items = intval($subscription->subscription_max_featured_listing);

            if(empty($allowed_num_featured_items))
            {
                return true;
            }
            else
            {
                $total_featured_items = $this->items()
                    ->where('item_featured', Item::ITEM_FEATURED)
                    ->get()->count();

                if($allowed_num_featured_items - $total_featured_items >= 1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }

        }
        elseif($this->isAdmin())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function getAdmin()
    {
        return User::where('role_id', Role::ADMIN_ROLE_ID)->first();
    }

    public function getLocale()
    {
        return $this->user_prefer_language;
    }

    public function deleteUser()
    {
        // #1 - delete all items of this user.
        $items = $this->items()->get();
        foreach($items as $key => $item)
        {
            $item->deleteItem();
        }

        // #2 - delete all user's messages
        $participants = DB::table('participants')
            ->where('user_id', $this->id)
            ->get();
        foreach($participants as $key => $participant)
        {
            DB::table('participants')
                ->where('thread_id', $participant->thread_id)
                ->delete();
            DB::table('messages')
                ->where('thread_id', $participant->thread_id)
                ->delete();
            DB::table('threads')
                ->where('id', $participant->thread_id)
                ->delete();
            ThreadItem::where('thread_id', $participant->thread_id)->delete();
        }

        // #3 - delete user's review image galleries
        $reviews = DB::table('reviews')
            ->where('author_id', $this->id)
            ->get();

        foreach($reviews as $key => $a_review)
        {
            $review_image_galleries = DB::table('review_image_galleries')
                ->where('review_id', $a_review->id)
                ->get();

            foreach($review_image_galleries as $key_1 => $review_image_gallery)
            {
                if(Storage::disk('public')->exists('item/review/' . $review_image_gallery->review_image_gallery_name)){
                    Storage::disk('public')->delete('item/review/' . $review_image_gallery->review_image_gallery_name);
                }
                if(Storage::disk('public')->exists('item/review/' . $review_image_gallery->review_image_gallery_thumb_name)){
                    Storage::disk('public')->delete('item/review/' . $review_image_gallery->review_image_gallery_thumb_name);
                }

                DB::table('review_image_galleries')
                    ->where('id', $review_image_gallery->id)
                    ->delete();
            }
        }

        // #4 - delete user's reviews
        DB::table('reviews')
            ->where('author_id', $this->id)
            ->delete();

        // #5 - delete user's comments
        DB::table('comments')
            ->where('commenter_id', $this->id)
            ->delete();

        // #6 - delete saved items records
        DB::table('item_user')
            ->where('user_id', $this->id)
            ->delete();

        // #7 - delete socialite accounts records
        $socialite_accounts = $this->socialiteAccounts()->get();
        foreach($socialite_accounts as $key => $socialite_account)
        {
            $socialite_account->delete();
        }

        // #8 - delete all user invoices
        $invoices = $this->subscription()
            ->get()->first()
            ->invoices()
            ->get();
        foreach($invoices as $key => $invoice)
        {
            $invoice->delete();
        }

        // #9 - delete subscription record
        $subscriptions = $this->subscription()->get();
        foreach($subscriptions as $key => $subscription)
        {
            $subscription->delete();
        }

        // #10 - delete user profile image
        if(!empty($this->user_image))
        {
            if(Storage::disk('public')->exists('user/' . $this->user_image)){
                Storage::disk('public')->delete('user/' . $this->user_image);
            }
        }

        // #11 - delete user business claims
        $item_claims = $this->claims()->get();
        foreach($item_claims as $item_claims_key => $item_claim)
        {
            $item_claim->deleteItemClaim();
        }

        // #12 - delete user products
        $products = $this->products()->get();
        foreach($products as $products_key => $product)
        {
            $product->deleteProduct();
        }

        // #13 - delete user product attributes
        $attributes = $this->attributes()->get();
        foreach($attributes as $attributes_key => $attribute)
        {
            $attribute->deleteAttribute();
        }

        // #14 - delete the user
        $this->delete();
    }
}
