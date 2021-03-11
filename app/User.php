<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone', 'password', 'role',
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
    public function setPasswordAttribute($value)
    {

        $this->attributes['password'] = bcrypt($value);
    }

    public function roles()
    {

        return $this->belongsTo('\App\Role', 'role');
    }


    public function country()
    {

        return $this->belongsTo('\App\Country');
    }


    public function buys()
    {

        return $this->hasMany('\App\Buyer');
    }


    public function travels()
    {

        return $this->hasMany('\App\Travel');
    }

    public function coupons()
    {
        return $this->hasMany('\App\Coupon');
    }

    public function schedules()
    {
        return $this->hasMany('\App\CouponSchedule');
    }


    public function scopeBuyerTraveler($query)
    {

        return $query->where('role', 3);
    }


    public function scopeAdmins($query)
    {

        return $query->where('role', 2);
    }


    public function scopeJoinedToday($query)
    {

        return $query->where('role', 3)->whereBetween('created_at', [Carbon::now()->format('Y-m-d') . ' 00:00:00', Carbon::now()->format('Y-m-d') . ' 23:59:59']);
    }


    public function scopeJoinedThisWeek($query)
    {

        return $query->where('role', 3)->whereBetween('created_at', [Carbon::now()->addDays(-7)->format('Y-m-d') . ' 00:00:00', Carbon::now()->format('Y-m-d') . ' 23:59:59']);
    }


    public function scopeJoinedLastMonth($query)
    {

        return $query->where('role', 3)->whereBetween('created_at', [Carbon::now()->addMonths(-1)->format('Y-m-d') . ' 00:00:00', Carbon::now()->format('Y-m-d') . ' 23:59:59']);
    }

    public function scopeJoinedThreeMonthsAgo($query)
    {

        return $query->where('role', 3)->whereBetween('created_at', [Carbon::now()->addMonths(-6)->format('Y-m-d') . ' 00:00:00', Carbon::now()->addMonths(-3)->format('Y-m-d') . ' 23:59:59']);
    }

    public function scopeJoinedSixMonthsAgo($query)
    {

        return $query->where('role', 3)->whereBetween('created_at', [Carbon::now()->addMonths(-12)->format('Y-m-d') . ' 00:00:00', Carbon::now()->addMonths(-6)->format('Y-m-d') . ' 23:59:59']);
    }

    public function scopeJoinedOneYearAgo($query)
    {

        return $query->where('role', 3)->whereBetween('created_at', [Carbon::now()->addMonths(-48)->format('Y-m-d') . ' 00:00:00', Carbon::now()->addMonths(-12)->format('Y-m-d') . ' 23:59:59']);
    }


    public function sentMessages()
    {

        return $this->hasMany('\App\Message', 'message_from');
    }


    public function receivedMessages()
    {

        return $this->hasMany('\App\Message', 'message_to');
    }


    public function sentChats()
    {

        return $this->hasMany('\App\Chat', 'message_from');
    }


    public function receivedChats()
    {

        return $this->hasMany('\App\Chat', 'message_to');
    }


    public function buyOffers()
    {

        return $this->hasMany('\App\Offer', 'buyer_id');
    }


    public function carryOffers()
    {

        return $this->hasMany('\App\Offer', 'traveller_id');
    }


    public function buyPosts()
    {

        return $this->hasMany('\App\Buyer');
    }


    public function tripPosts()
    {

        return $this->hasMany('\App\Travel');
    }


    public function orders()
    {

        return $this->hasMany('\App\Order');
    }


    public function receivedNotifications()
    {

        return $this->hasMany('\App\Notification', 'notification_to');
    }

    public static function set_and_get_token($user_id)
    {
        $email_token = str_random(50);
        $update = self::find($user_id)->update(['email_token' => $email_token]);
        if ($update) {
            return $email_token;
        }
        return false;
    }

    public static function verify_email($user_id)
    {
        $email_token = self::set_and_get_token($user_id);
        if ($email_token) {
            $mail = new \App\Http\Controllers\Mails;
            $mail->userEmailVerifyTokenSend($user_id, $email_token);
            return true;
        }
        return false;
    }


    // public static function boot()
    // {

    //     parent::boot();

    //     static::creating(function ($model) {
    //         if (auth()->user()) {

    //             $model->created_by = auth()->user()->id;
    //         }
    //     });

    //     static::updating(function ($model) {
    //         if (auth()->user()) {

    //             $model->updated_by = auth()->user()->id;
    //         }
    //     });
    // }

    public static function getCheckAuth()
    {

        if (!auth()->guest()) {

            if (isset(auth()->user()->id) && (auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 4)) {

                if (auth()->user()->id != 1 && auth()->user()->role == 1) {
                    return 0;
                }

                $auth_users = getenv('BACK_END_AUTH_USERS_ID');
                $users = explode(',', $auth_users);
                if (in_array(auth()->user()->id, $users)) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return 1;
            }
        } else {
            return 1;
        }
    }

    public function UserAddress()
    {
        return $this->hasOne('\App\UserAddress', 'id', 'user_id');
    }
}
