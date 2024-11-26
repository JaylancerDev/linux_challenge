<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('customers') }}" wire:navigate>
            <x-application-logo class="h-9" />
        </a>

        <!-- Toggle Button for Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <!-- <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('customers') ? 'active' : '' }}" href="{{ route('customers') }}" wire:navigate>
                        {{ __('Dashboard') }}
                    </a>
                </li>
            </ul>
        </div> -->

        <!-- User Settings Dropdown (Desktop) -->
        <div class="d-none d-sm-block">
            <div class="dropdown">
                <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile') }}" wire:navigate>
                            {{ __('Profile') }}
                        </a>
                    </li>
                    <li>
                        <button wire:click="logout" class="dropdown-item w-100 text-start">
                            {{ __('Log Out') }}
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div class="d-block d-sm-none">
        <div class="pt-2 pb-3">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('customers') ? 'active' : '' }}" href="{{ route('customers') }}" wire:navigate>
                        {{ __('Dashboard') }}
                    </a>
                </li>
            </ul>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-top">
            <div class="px-3">
                <div class="font-medium text-base text-gray-800" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3">
                <ul class="list-unstyled">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile') }}" wire:navigate>
                            {{ __('Profile') }}
                        </a>
                    </li>
                    <li>
                        <button wire:click="logout" class="dropdown-item w-100 text-start">
                            {{ __('Log Out') }}
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
