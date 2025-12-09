<?php 

namespace App\Actions\Profile;

class UpdateProfile {

    public function __invoke($user, array $data)
    {
        return $user->update($data);
    }
    
}