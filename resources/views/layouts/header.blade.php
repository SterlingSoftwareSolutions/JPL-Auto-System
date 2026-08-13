<header>
    <nav class="bg-white border-b border-gray-200">
        <div class="flex items-center justify-between px-6 h-20">
            <!-- Left side: Welcome Message -->
            <div class="flex items-center">
                <div class="text-xl font-bold text-gray-800 tracking-tight">
                    Welcome back, <span class="text-black">Admin</span> <span class="text-2xl ml-1">👋</span>
                </div>
            </div>

            <!-- Right side: Logout -->
            <div class="flex items-center space-x-5">
                <form method="POST" action="{{ route('logout') }}" class="inline m-0 p-0">
                    @csrf
                    <button type="submit" class="w-10 h-10 flex items-center justify-center bg-black text-white hover:bg-gray-800 rounded-full transition-colors shadow-sm" title="Logout">
                        <i class="fas fa-power-off text-sm"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>
</header>
