<?php

namespace App;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


/**
 * Listing Model
 * 
 * @param $name string
 * @param $description string
 * @param $condition string
 * @param $whatsAppNumber string
 * @param $cellNumber string
 * @param $email string
 * @param $address string
 * @param $category string
 * @param $price double
 * @param $currency string
 * @param $condition string
 * @param $image_1 string
 * @param $image_2 string
 * @param $image_3 string
 * 
 */
class Listing extends Model implements HasMedia
{
    use InteractsWithMedia;
    use Sluggable;

    public $fillable = [
        'user_id',
        'name',
        'description',
        'condition',
        'whatsapp_number',
        'cell_number',
        'email',
        'location',
        'category',
        'price',
        'priority',
        'status',
        'currency',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * @param Media|null $media
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->crop('crop-center', 460, 306);
    }


    /**
     * @return string
     */
    public function thumbnail()
    {

        if ($this->media->first()) {

            return $this->media->first()->getFullUrl('thumb');
        }
        return Storage::url('public/logo-banner.png');
    }


    /**
     * @return string
     */
    public function featuredImage()
    {

        if ($this->media->first()) {

            return $this->media->first()->getFullUrl('thumb');
        }
        return Storage::url('public/logo-banner.png');
    }

    public function except()
    {
        return Str::limit(strip_tags($this->description), 120);
    }

    public function getCategory()
    {
        return Category::find($this->category)->category;
    }

    public function getPrice()
    {
        return number_format($this->price, 2);
    }

    public function getStatus()
    {
        if($this->status == 1){
            return "Approved";
        }
        return "Pending";
    }
}
