<?php

namespace App\Policies;

use App\Models\MedicalRecord;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MedicalRecordPolicy
{
    public function viewAny(User $user)
{
    return in_array($user->role, ['doctor', 'nurse']);
}

public function create(User $user)
{
    return in_array($user->role, ['doctor', 'nurse']);
}

public function update(User $user, MedicalRecord $medicalRecord)
{
    return in_array($user->role, ['doctor', 'nurse']);
}

}
