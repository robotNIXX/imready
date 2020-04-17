<?php

    namespace App\Models;

    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Spatie\MediaLibrary\HasMedia\HasMedia;
    use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
    use Spatie\MediaLibrary\Models\Media;
    use Tymon\JWTAuth\Contracts\JWTSubject;

    class User extends Authenticatable implements JWTSubject, HasMedia
    {
        use Notifiable;
        use HasMediaTrait;

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'name', 'email', 'password',
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token', 'created_at', 'updated_at',
        ];

        /**
         * The attributes that should be cast to native types.
         *
         * @var array
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
        ];

        public function getJWTIdentifier()
        {
            return $this->getKey();
        }

        public function getJWTCustomClaims()
        {
            return [];
        }

        public function registerMediaConversions(Media $media = null)
        {
            $this->addMediaConversion('avatar')
                ->width(100)
                ->height(100)
                ->sharpen(10);
        }

        /**
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function tasks()
        {
            return $this->hasMany(Task::class, 'author_id');
        }
    }
