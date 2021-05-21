<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\GeneratesUuid;
use Dyrynda\Database\Casts\EfficientUuid;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Intervention;

class Image extends Model
{
    use HasFactory, GeneratesUuid;

    protected $casts = [
        'uuid' => EfficientUuid::class,
    ];

    public function imageable()
    {
        return $this->morphTo();
    }

    /**
     * uploadImage
     *
     * @param  mixed $file
     *
     * @return string $newImage
     */
    protected function uploadImage($file, $px2 = 2000)
    {
        $newImage = $this->processImage($file, $px2);

        return $newImage;
    }

    /**
     * processImage
     *
     * @param  mixed $image
     * @param  mixed $size
     *
     * @return array $filePath
     */
    private function processImage($image, $size)
    {
        $options = [
            'visibility'    =>  'public',
            'Cache-Control' =>  'max-age=31540000',
            'Expires'       =>  now()->addRealDecade()->format('D, d M Y H:i:s T')
        ];

        $resize =
        Intervention::make($image)
            ->resize($size, $size, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode('png')
            ->stream();

        $hash = Str::uuid();
        $fileName = $hash . '.png';
        if ( config('app.env') == 'production' ) {
            Storage::disk('s3')->getDriver()->put('/images/'. $fileName , $resize->__toString(), $options);
            $filePath = 'https://cdn.gemreptiles.com/images/'. $fileName;
        } else {
            Storage::disk('local')->put('/public/images/'. $fileName , $resize->__toString());
            $filePath = Storage::disk('local')->url('images/'. $fileName);
        }

        return $filePath;
    }
}
