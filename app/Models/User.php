<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Intervention\Image\Laravel\Facades\Image;
use Spatie\Permission\Traits\HasRoles;




class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'photo',
        'phone',
        'status',
        'is_admin',
        'user_name'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
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
            Storage::disk('local')->put('admin/images/users/small/'.$name,(string)$smallImage->toPng(90));
            Storage::disk('local')->put('admin/images/users/big/'.$name,(string)$bigImage->toPng(90));
            return $name;
        }else { 
            return '';
        }

    }
}
