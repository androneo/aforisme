<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aforism extends Model
{
	use \Conner\Tagging\Taggable;
    use \Conner\Likeable\LikeableTrait;

	protected $fillable = ['user_id', 'content', 'răspuns', 'verificat'];

	/**
     * Get the user who inserted the aforism.
     */
     public function user()
     {
     	return $this->belongsTo('App\User');
     }

     /**
    * Return the date portion of updated_at
    */
    public function getPublishDateAttribute($value)
    {
        return $this->updated_at->format('M-j-Y');
    }

    /**
    * Return the time portion of updated_at
    */
    public function getPublishTimeAttribute($value)
    {
        return $this->updated_at->format('g:i A');
    }

    public function scopeVerified($query)
    {
        return $query->where('verificat','=', config('aforism.verificare_aforisme'));
    }

    public function scopePopular($query,$order=null)
    {
        if(is_null($order)) {
            return $query->orderBy('likeable_like_counters.count', 'desc')->orderBy('id', 'desc');;
        }

        return $query->orderBy('likeable_like_counters.count', $order)->orderBy('id', $order);
    }

    public function scopeChrono($query,$order=null)
    {
        if(is_null($order)) {
            return $query->orderBy('id', 'desc');;
        }

        return $query->orderBy('id', $order);
    }
}
