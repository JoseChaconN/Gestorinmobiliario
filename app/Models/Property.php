<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Property extends Model implements HasMedia
{
    use HasFactory,SoftDeletes,InteractsWithMedia;
    protected $guarded = [];

    public function owner(): HasOne
    {
        return $this->HasOne(Customer::class,'id','owner_id');
    }
    public function region(): HasOne
    {
        return $this->HasOne(Region::class,'id','region_id')->withDefault();
    }
    public function commune(): HasOne
    {
        return $this->HasOne(Commune::class,'id','commune_id')->withDefault();
    }
    public function community(): HasOne
    {
        return $this->HasOne(Community::class,'id','community_id')->withDefault();
    }
}
