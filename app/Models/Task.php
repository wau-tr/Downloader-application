<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Task extends Model implements HasMedia
{
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'url'
    ];

    /**
     * Name of media collection.
     * 
     * @var string
     */
    private $collectionName = 'resource';

    /**
     * Registers media collections.
     */
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection($this->collectionName)
            ->singleFile();
    }

    /**
     * Retrieves resource related with model.
     *
     * @return mixed
     *  Url to resource.
     */
    public function getResourceUrl(): ?string
    {
        return $this->getFirstMediaUrl($this->collectionName);
    }

}
