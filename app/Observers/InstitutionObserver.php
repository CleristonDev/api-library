<?php

namespace App\Observers;

use App\Models\Institution;
use App\Services\UserService;

class InstitutionObserver
{
    /**
     * Handle the Institution "created" event.
     */
    public function created(Institution $institution): void
    {
        $userService =  new  UserService;
        $userService->create([
            'institution_id' => $institution->id,
            'name' => $institution->name,
            'email' => $institution->email,
            'password' => $institution->password,
            'type' => $institution->type,
            'is_admin' => true,
            'status' => $institution->status,
        ]);
    }

    /**
     * Handle the Institution "updated" event.
     */
    public function updated(Institution $institution): void
    {
        //
    }

    /**
     * Handle the Institution "deleted" event.
     */
    public function deleted(Institution $institution): void
    {
        //
    }

    /**
     * Handle the Institution "restored" event.
     */
    public function restored(Institution $institution): void
    {
        //
    }

    /**
     * Handle the Institution "force deleted" event.
     */
    public function forceDeleted(Institution $institution): void
    {
        //
    }
}
