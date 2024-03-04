<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    use HasFactory;
    protected $fillable=[
        'title','url','image'
    ];

    public static function  saveImage($file) 
    { 
        if ( $file ) {
            $name = time() . '.'. $file->extension();
            $smallImage = Image::read($file->getRealPath());
            $bigImage = Image::read($file->getRealPath());
            $smallImage->resize(256,256,function($constraint) { 
                $constraint->aspectRation();
            });
            Storage::disk('local')->put('admin/images/sliders/small/'.$name,(string)$smallImage->toPng(90));
            Storage::disk('local')->put('admin/images/sliders/big/'.$name,(string)$bigImage->toPng(90));
            return $name;
        }else { 
            return '';
        }

    }
}
