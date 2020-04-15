<?php


    namespace App\Transformers;


    use App\Models\User;
    use League\Fractal\TransformerAbstract;

    class UsersTransformer extends TransformerAbstract
    {
        public function transform(User $user)
        {
            return [
                'id'            => $user->id,
                'email'         => $user->email,
                'name'          => $user->name,
                'profile_image' => $this->getProfileImage($user),
                'avatar'        => $this->getAvatarImage($user),
            ];
        }

        protected function getProfileImage(User $user)
        {
            $profileImage = $user->getFirstMedia();

            return $profileImage ? $user->getFirstMediaUrl() : '';
        }

        protected function getAvatarImage(User $user)
        {
            $profileImage = $user->getFirstMedia();

            return $profileImage ? $profileImage->getUrl('avatar') : '';
        }
    }
