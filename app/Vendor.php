<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Sluggable;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Intervention;

class Vendor extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name', 'email'
    ];

    /**
     * Get the post's image.
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function updateVendorPhoto()
    {
        tap($this->profile_photo_path, function ($previous) use ($photo) {
            $options = [
                'visibility'    =>  'public',
                'Cache-Control' =>  'max-age=31540000',
                'Expires'       =>  now()->addRealDecade()->format('D, d M Y H:i:s T')
            ];

            $size = 200;

            $i = Intervention::make($photo)
            ->resize($size, $size, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->fit($size, $size)
            ->encode('webp')
            ->stream();

            $hash = Str::uuid();

            $fileName = $hash . '.webp';

            if (config('jetstream.profile_photo_disk') === "local")
            {
                Storage::disk($this->profilePhotoDisk())->getDriver()->put('public/profile-photos/'. $fileName , $i->__toString(), $options);
            } else {
                Storage::disk($this->profilePhotoDisk())->getDriver()->put("profile-photos/". $fileName , $i->__toString(), $options);
            }

            $this->forceFill([
                'profile_photo_path' => "profile-photos/" . $fileName
            ])->save();

            if ($previous) {
                Storage::disk(config('files'))->delete($previous);
            }
        });
    }
}
