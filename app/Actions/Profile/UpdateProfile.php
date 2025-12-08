<?php 

namespace App\Actions\Profile;

use App\Models\User;

class UpdateProfile {

    public function __invoke(User $user, array $data)
    {
        return $user->update($data);
    }
    
}