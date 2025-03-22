    <!-- Header -->
    <header class="sticky top-0 bg-gradient-to-r from-blue-600 to-indigo-600 shadow-lg z-50">
        <div class="max-w-[100%] mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md transform hover:scale-110 transition duration-300">
                    <div class="w-6 h-6 bg-blue-500 rounded-md transform rotate-45"></div>
                </div>
                <span class="text-2xl font-extrabold text-white tracking-tight">EfixTool</span>
            </div>

            <button class="lg:hidden text-white hamburger" aria-label="Toggle menu">
                <i class="fas fa-bars text-2xl mobile-icon"></i>
            </button>
            @hasSection('pagetitle')

            <span class="hidden lg:block text-white font-medium hover:text-yellow-300 transition duration-200 ease-in-out transform hover:scale-105">@yield('pagetitle') </span>

            <nav class="hidden md:flex items-center space-x-8">

                <a href="#" class="bg-yellow-400 text-gray-900 px-5 py-2 rounded-full font-semibold shadow-md hover:bg-yellow-500 hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105">Sign Up</a>

            </nav>
            @else

            <nav class="hidden md:flex items-center space-x-8">
                @include('frontend.layouts.partials.headerMenu')
                
            </nav>
            @endif
        </div>
    </header>