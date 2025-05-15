<?php

namespace App\Http\Responses;

use Auth;
use Filament\Http\Responses\Auth\RegistrationResponse;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class RegisterResponse extends RegistrationResponse
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
