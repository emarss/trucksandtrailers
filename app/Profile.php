<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $user_id
 * @property str $role
 * @property str $national_id
 * @property str $address
 * @property str $cell_number
 * @property str $facebook
 * @property str $linkedin
 * @property str $twitter
 * @property str $bio
 * 
 */ 

class Profile extends Model implements HasMedia
{

    use InteractsWithMedia;

	protected $fillable = ['user_id', 'role', 'national_id', 'address', 'cell_number', 'facebook', 'twitter', 'linkedin', 'bio'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function registerMediaConversions(Media $media = null) : void
    {
        $this->addMediaConversion('avatar')
            ->width(600)
            ->height(600);
        $this->addMediaConversion('thumb')
                ->crop('crop-center', 200, 200);
    }

    /**
     * @return string
     */
    public function thumbnail(){

        if($this->media->first()){

            return $this->media->first()->getFullUrl('thumb');

        }
        return Storage::url('public/users/avatar-thumb.png');
    }

    /**
     * @return string
     */
    public function avatar(){

        if($this->media->first()){

            return $this->media->first()->getFullUrl('avatar');

        }
        return Storage::url('public/users/avatar.png');
    }
}
