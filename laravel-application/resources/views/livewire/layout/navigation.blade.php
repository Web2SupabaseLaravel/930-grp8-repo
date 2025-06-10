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

<!-- resources/views/livewire/layout/navigation.blade.php -->
<nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700" x-data="{ open: false }">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <!-- Left Side: Logo & Navigation Links -->
      <div class="flex">
        <div class="shrink-0 flex items-center">
          <a href="{{ route('dashboard') }}" class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            {{ config('app.name', 'Laravel') }}
          </a>
        </div>

        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
          <a href="{{ route('user.index') }}"
             class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium 
            {{ request()->routeIs('user.index') ? 'border-indigo-400 text-gray-900 dark:text-white' : 'border-transparent text-gray-500 dark:text-gray-300 hover:border-gray-300 hover:text-gray-700 dark:hover:text-gray-100' }}">
            المستخدمون
          </a>
        </div>
      </div>

      <!-- Right Side: User Settings -->
      <div class="hidden sm:flex sm:items-center sm:ml-6">
        @auth
          <span class="text-gray-800 dark:text-gray-200 mr-4">
            مرحباً {{ Auth::user()?->name }}
          </span>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
              تسجيل الخروج
            </button>
          </form>
        @endauth

        @guest
          <a href="{{ route('login') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white mr-4">
            تسجيل الدخول
          </a>
          @if (Route::has('register'))
            <a href="{{ route('register') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
              تسجيل
            </a>
          @endif
        @endguest
      </div>

      <!-- Mobile Hamburger -->
      <div class="-mr-2 flex items-center sm:hidden">
        <button @click="open = ! open" type="button"
                class="inline-flex items-center justify-center p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Responsive Menu -->
  <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
      <a href="{{ route('dashboard') }}"
         class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium 
         {{ request()->routeIs('dashboard') ? 'border-indigo-400 text-indigo-700 bg-indigo-50 dark:bg-gray-900 dark:text-white' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 dark:text-gray-300 dark:hover:bg-gray-800' }}">
        لوحة التحكم
      </a>

      <a href="{{ route('user.index') }}"
         class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium 
         {{ request()->routeIs('user.index') ? 'border-indigo-400 text-indigo-700 bg-indigo-50 dark:bg-gray-900 dark:text-white' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 dark:text-gray-300 dark:hover:bg-gray-800' }}">
        المستخدمون
      </a>
    </div>
  </div>
</nav>