<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    public function index(): View
    {
        return view('landing');
    }

    public function subscribe(StoreSubscriberRequest $request): RedirectResponse
    {
        Subscriber::create([
            'email' => strtolower($request->string('email')->toString()),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'subscribed_at' => now(),
        ]);

        return back()->with('success', 'Thanks for subscribing! We will keep you updated.');
    }
}
