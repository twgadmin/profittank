<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Str;

/**
 * Class GenerateAdminPasswordListener
 *
 * @author Muhammad Shahab <muhammad.shahab@vservices.com>
 * @date   7/17/19
 */
class GenerateAdminPasswordListener
{
    private $adminRepository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(\App\Repositories\Interfaces\AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AdminCreatedEvent  $event
     * @return void
     */
    public function handle(\App\Events\AdminCreatedEvent $event)
    {
        $admin                = $event->admin;
        $rawRandomPassword    = Str::random(8);
        $encryptedPassword    = bcrypt($rawRandomPassword);

        $this->adminRepository->update($admin->id, ['password' => $encryptedPassword]);

        $data = [
            'name'     => $admin->fullName(),
            'email'    => $admin->email,
            'password' => $rawRandomPassword,
        ];

        /*
         * Trigger AdminPasswordCreatedEvent
         */
        event(new \App\Events\AdminPasswordCreatedEvent($data));
    }
}
