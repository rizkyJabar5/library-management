<?php

namespace App\Http\Responses;

use Auth;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;
use Filament\Http\Responses\Auth\LoginResponse as BaseLoginResponse;

class LoginResponse extends BaseLoginResponse
{
    public function toResponse($request): RedirectResponse|Redirector
    {
        $isAdmin = Auth::user()->isAdmin();

        if (!$isAdmin) {
            return redirect()->intended('/student');
        }

        return parent::toResponse($request);
    }
}
