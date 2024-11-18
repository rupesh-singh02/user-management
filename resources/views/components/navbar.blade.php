<nav class="bg-gray-800 py-4 px-12">
        <div class="container-fluid flex items-center justify-end">
            <div class="flex items-center space-x-10 text-white">
                @auth
                    <span>Welcome, {{ Auth::user()->name }}</span>

                    <!-- Logout Form -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 px-4 py-2 rounded hover:bg-red-600">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-white">Login</a>
                @endauth
            </div>
        </div>
    </nav>