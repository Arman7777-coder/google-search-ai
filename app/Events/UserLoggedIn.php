<?php

declare(strict_types=1);

namespace App\Events;

use Illuminate\Auth\Events\Login;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class UserLoggedIn
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private Request $request;
    private string $ip;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
       $this->request = $request;
       $this->ip = $request->getClientIp();
    }

    public function handle(Login $event): void
    {
        $infoData = [
            'browser' => $this->request->header('user-agent'),
            'ip_address' => $this->ip,
            'login_date' => now(),
        ];
        $event->user->loginInfo()->create($infoData);
    }
}
