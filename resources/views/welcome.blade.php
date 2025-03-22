<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToolBox</title>
    <!-- Add Google Fonts for Poppins and Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')

</head>
<body class="bg-white text-gray-900 font-sans">

    <!-- Header -->
    <header class="sticky top-0 bg-gradient-to-r from-blue-600 to-indigo-600 shadow-lg z-50">
        <div class="max-w-[90%] mx-auto px-6 py-4 flex items-center justify-between">
            <!-- Logo and Brand -->
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md transform hover:scale-110 transition duration-300">
                    <div class="w-6 h-6 bg-blue-500 rounded-md transform rotate-45"></div>
                </div>
                <span class="text-2xl font-extrabold text-white tracking-tight">ToolBox</span>
            </div>
    
            <!-- Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="#" class="text-white font-medium hover:text-yellow-300 transition duration-200 ease-in-out transform hover:scale-105">Home</a>
                <a href="#" class="text-white font-medium hover:text-yellow-300 transition duration-200 ease-in-out transform hover:scale-105">Tools</a>
                <a href="#" class="text-white font-medium hover:text-yellow-300 transition duration-200 ease-in-out transform hover:scale-105">Pricing</a>
                <a href="#" class="bg-yellow-400 text-gray-900 px-5 py-2 rounded-full font-semibold shadow-md hover:bg-yellow-500 hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105">Sign Up</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="pt-12 relative overflow-hidden bg-gradient-to-b">
        <div class="max-w-[90%] mx-auto px-6 text-center relative z-10">
            <!-- Heading -->
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 mb-4 tracking-tight animate-slide-in">
                <span class="relative inline-block">
                    <span class="relative text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-500 to-purple-600 animate-gradient-flow">ToolBox</span>
                </span>
                <span class="block text-gray-900 mt-2 text-2xl md:text-3xl font-semibold tracking-wide">The Future of Productivity</span>
            </h1>
    
            <!-- Subtext -->
            <p class="text-lg md:text-xl text-gray-700 max-w-3xl mx-auto mb-6 leading-relaxed font-medium animate-slide-in delay-100">
                Elevate your workflow with cutting-edge tools — from streamlined utilities to advanced SEO solutions. Empower your success today.
            </p>
    
            <!-- CTA Button -->
            <a href="#tools" class="inline-block bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-10 py-4 mb-8 rounded-full font-semibold text-lg shadow-xl hover:shadow-2xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 ease-in-out transform hover:scale-105 animate-pulse-glow relative overflow-hidden">
                <span class="relative z-10">Get Started Now</span>
                <span class="absolute inset-0 bg-gradient-to-r from-blue-500 to-indigo-500 opacity-0 hover:opacity-20 transition-opacity duration-300"></span>
            </a>
        </div>
    
        <!-- Image Section -->
        <div class="max-w-[90%] mx-auto px-6 pb-0">
            <div class="grid grid-cols-3 gap-1 items-end">
                <!-- Left Image (Bigger) -->
                <div class="overflow-hidden rounded-lg border-2 border-gray-300 bg-gray-100">
                    <img src="{{asset('frontend/images/image1.webp')}}" alt="Left Image" width="594" height="370" class="w-full h-full object-cover">
                </div>
    
                <!-- Middle Image (Smaller) -->
                <div class="overflow-hidden rounded-lg border-2 border-gray-300 bg-gray-100">
                    <img src="{{asset('frontend/images/image2.webp')}}" alt="Middle Image" width="562" height="321" class="w-full h-full object-cover">
                </div>
    
                <!-- Right Image (Bigger) -->
                <div class="overflow-hidden rounded-lg border-2 border-gray-300 bg-gray-100">
                    <img src="{{asset('frontend/images/image3.webp')}}" alt="Right Image" width="594" height="370" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- Tools by Category -->
    <section id="tools" class="py-16 bg-gray-50">
        <div class="max-w-[90%] mx-auto px-6">
            <!-- Generic Tools -->
            <div class="mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-8 text-center animate-fade-in">
                    Generic Tools
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                    <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-blue-500 transition-all duration-300 flex flex-col items-center text-center group relative">
                        <div class="w-14 h-14 bg-blue-100 rounded-full mb-4 flex items-center justify-center transform group-hover:scale-110 transition duration-300">
                            <span class="text-blue-600 font-bold text-lg">CC</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Character Counter</h3>
                        <p class="text-gray-600 text-sm mt-2 mb-4">Count characters easily</p>
                        <a href="#" class="text-blue-600 text-sm font-bold hover:underline">
                            Try Now
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-blue-500 transition-all duration-300 flex flex-col items-center text-center group relative">
                        <div class="w-14 h-14 bg-blue-100 rounded-full mb-4 flex items-center justify-center transform group-hover:scale-110 transition duration-300">
                            <span class="text-blue-600 font-bold text-lg">QR</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">QR Code Generator</h3>
                        <p class="text-gray-600 text-sm mt-2 mb-4">Create QR codes in seconds</p>
                        <a href="#" class="text-blue-600 text-sm font-bold hover:underline">
                            Try Now
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-blue-500 transition-all duration-300 flex flex-col items-center text-center group relative">
                        <div class="w-14 h-14 bg-blue-100 rounded-full mb-4 flex items-center justify-center transform group-hover:scale-110 transition duration-300">
                            <span class="text-blue-600 font-bold text-lg">URL</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">URL Shortener</h3>
                        <p class="text-gray-600 text-sm mt-2 mb-4">Shorten long URLs easily</p>
                        <a href="#" class="text-blue-600 text-sm font-bold hover:underline">
                            Try Now
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-blue-500 transition-all duration-300 flex flex-col items-center text-center group relative">
                        <div class="w-14 h-14 bg-blue-100 rounded-full mb-4 flex items-center justify-center transform group-hover:scale-110 transition duration-300">
                            <span class="text-blue-600 font-bold text-lg">FG</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Favicon Generator</h3>
                        <p class="text-gray-600 text-sm mt-2 mb-4">Generate favicons</p>
                        <a href="#" class="text-blue-600 text-sm font-bold hover:underline">
                            Try Now
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-blue-500 transition-all duration-300 flex flex-col items-center text-center group relative">
                        <div class="w-14 h-14 bg-blue-100 rounded-full mb-4 flex items-center justify-center transform group-hover:scale-110 transition duration-300">
                            <span class="text-blue-600 font-bold text-lg">NB</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Notebook</h3>
                        <p class="text-gray-600 text-sm mt-2 mb-4">Simple note-taking tool</p>
                        <a href="#" class="text-blue-600 text-sm font-bold hover:underline">
                            Try Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- SEO Tools -->
            <div class="mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-8 text-center animate-fade-in">
                    SEO Tools
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                    <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-green-500 transition-all duration-300 flex flex-col items-center text-center group relative">
                        <div class="w-14 h-14 bg-green-100 rounded-full mb-4 flex items-center justify-center transform group-hover:scale-110 transition duration-300">
                            <span class="text-green-600 font-bold text-lg">ST</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Schema Tester</h3>
                        <p class="text-gray-600 text-sm mt-2 mb-4">Schema Markup Tool</p>
                        <a href="#" class="text-green-600 text-sm font-bold hover:underline">
                            Try Now
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-green-500 transition-all duration-300 flex flex-col items-center text-center group relative">
                        <div class="w-14 h-14 bg-green-100 rounded-full mb-4 flex items-center justify-center transform group-hover:scale-110 transition duration-300">
                            <span class="text-green-600 font-bold text-lg">WS</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Speed Test</h3>
                        <p class="text-gray-600 text-sm mt-2 mb-4">Check Website Speed</p>
                        <a href="#" class="text-green-600 text-sm font-bold hover:underline">
                            Try Now
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-green-500 transition-all duration-300 flex flex-col items-center text-center group relative">
                        <div class="w-14 h-14 bg-green-100 rounded-full mb-4 flex items-center justify-center transform group-hover:scale-110 transition duration-300">
                            <span class="text-green-600 font-bold text-lg">WA</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Website Audit</h3>
                        <p class="text-gray-600 text-sm mt-2 mb-4">Audit your website's SEO</p>
                        <a href="#" class="text-green-600 text-sm font-bold hover:underline">
                            Try Now
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-green-500 transition-all duration-300 flex flex-col items-center text-center group relative">
                        <div class="w-14 h-14 bg-green-100 rounded-full mb-4 flex items-center justify-center transform group-hover:scale-110 transition duration-300">
                            <span class="text-green-600 font-bold text-lg">XS</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">XML Sitemap</h3>
                        <p class="text-gray-600 text-sm mt-2 mb-4">Generate XML sitemaps</p>
                        <a href="#" class="text-green-600 text-sm font-bold hover:underline">
                            Try Now
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-green-500 transition-all duration-300 flex flex-col items-center text-center group relative">
                        <div class="w-14 h-14 bg-green-100 rounded-full mb-4 flex items-center justify-center transform group-hover:scale-110 transition duration-300">
                            <span class="text-green-600 font-bold text-lg">RT</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Robots.txt</h3>
                        <p class="text-gray-600 text-sm mt-2 mb-4">Create robots.txt files</p>
                        <a href="#" class="text-green-600 text-sm font-bold hover:underline">
                            Try Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Paid Tools -->
            <div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-8 text-center animate-fade-in">
                    Paid Tools <span class="text-sm text-gray-500 font-medium">(1 Month Free)</span>
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 max-w-4xl mx-auto">
                    <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-purple-500 transition-all duration-300 flex flex-col items-center text-center group relative">
                        <div class="w-14 h-14 bg-purple-100 rounded-full mb-4 flex items-center justify-center transform group-hover:scale-110 transition duration-300">
                            <span class="text-purple-600 font-bold text-lg">CB</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Content Backup</h3>
                        <p class="text-gray-600 text-sm mt-2 mb-4">Securely backup your content</p>
                        <a href="#" class="text-purple-600 text-sm font-bold hover:underline">
                            Try Now
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-purple-500 transition-all duration-300 flex flex-col items-center text-center group relative">
                        <div class="w-14 h-14 bg-purple-100 rounded-full mb-4 flex items-center justify-center transform group-hover:scale-110 transition duration-300">
                            <span class="text-purple-600 font-bold text-lg">SM</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">SEO Master</h3>
                        <p class="text-gray-600 text-sm mt-2 mb-4">Advanced SEO optimization suite</p>
                        <a href="#" class="text-purple-600 text-sm font-bold hover:underline">
                            Try Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="py-16 bg-[#e9f2ff] relative overflow-hidden">
        <div class="max-w-[90%] mx-auto px-6 text-center">
            <!-- Heading -->
            <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 mb-12 tracking-tight animate-slide-in">
                <span class="block">Why SEO People</span>
                <span class="relative inline-block">
                    <span class="relative text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-500 to-purple-600 animate-gradient-flow">Love ToolBox</span>
                </span>
            </h2>

            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Testimonial 1 -->
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 transform hover:scale-105 hover:shadow-xl transition-all duration-300 animate-slide-in delay-100">
                    <p class="text-gray-600 italic text-base leading-relaxed mb-4">
                        "ToolBox transformed my SEO workflow with its intuitive tools. My rankings have never been better!"
                    </p>
                    <p class="text-gray-900 font-semibold">— Jane Doe</p>
                    <p class="text-gray-500 text-sm">SEO Specialist</p>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 transform hover:scale-105 hover:shadow-xl transition-all duration-300 animate-slide-in delay-200">
                    <p class="text-gray-600 italic text-base leading-relaxed mb-4">
                        "The productivity boost I got from ToolBox is unreal. It’s a must-have for any SEO pro."
                    </p>
                    <p class="text-gray-900 font-semibold">— John Smith</p>
                    <p class="text-gray-500 text-sm">Digital Marketer</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 transform hover:scale-105 hover:shadow-xl transition-all duration-300 animate-slide-in delay-300">
                    <p class="text-gray-600 italic text-base leading-relaxed mb-4">
                        "From keyword research to analytics, ToolBox has it all. It’s my secret weapon."
                    </p>
                    <p class="text-gray-900 font-semibold">— Emily Carter</p>
                    <p class="text-gray-500 text-sm">Content Strategist</p>
                </div>

                <!-- Testimonial 4 -->
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 transform hover:scale-105 hover:shadow-xl transition-all duration-300 animate-slide-in delay-400">
                    <p class="text-gray-600 italic text-base leading-relaxed mb-4">
                        "I save hours every week thanks to ToolBox. It’s powerful yet so easy to use."
                    </p>
                    <p class="text-gray-900 font-semibold">— Michael Lee</p>
                    <p class="text-gray-500 text-sm">SEO Consultant</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Beloved Users Section -->
    <section class="py-16 bg-gray-50 relative overflow-hidden">
        <div class="max-w-[90%] mx-auto px-6 text-center">
            <!-- Heading -->
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-12 tracking-tight animate-slide-in">
                Our Beloved Users
            </h2>

            <!-- Logos Box -->
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-200 animate-slide-in delay-100">
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6">
                    <!-- Logo 1 -->
                    <div class="flex items-center justify-center">
                        <div class="border border-gray-200 rounded-lg p-2 transition-all duration-300 hover:border-blue-300 hover:shadow-md">
                            <img src="{{asset('frontend/images/user1.JPG')}}" alt="Website Logo 1" class="h-10 w-auto opacity-80 hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <!-- Logo 2 -->
                    <div class="flex items-center justify-center">
                        <div class="border border-gray-200 rounded-lg p-2 transition-all duration-300 hover:border-blue-300 hover:shadow-md">
                            <img src="{{asset('frontend/images/user2.JPG')}}" alt="Website Logo 2" class="h-10 w-auto opacity-80 hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <!-- Logo 3 -->
                    <div class="flex items-center justify-center">
                        <div class="border border-gray-200 rounded-lg p-2 transition-all duration-300 hover:border-blue-300 hover:shadow-md">
                            <img src="{{asset('frontend/images/user1.JPG')}}" alt="Website Logo 3" class="h-10 w-auto opacity-80 hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <!-- Logo 4 -->
                    <div class="flex items-center justify-center">
                        <div class="border border-gray-200 rounded-lg p-2 transition-all duration-300 hover:border-blue-300 hover:shadow-md">
                            <img src="{{asset('frontend/images/user2.JPG')}}" alt="Website Logo 4" class="h-10 w-auto opacity-80 hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <!-- Logo 5 -->
                    <div class="flex items-center justify-center">
                        <div class="border border-gray-200 rounded-lg p-2 transition-all duration-300 hover:border-blue-300 hover:shadow-md">
                            <img src="{{asset('frontend/images/user1.JPG')}}" alt="Website Logo 5" class="h-10 w-auto opacity-80 hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <!-- Logo 6 -->
                    <div class="flex items-center justify-center">
                        <div class="border border-gray-200 rounded-lg p-2 transition-all duration-300 hover:border-blue-300 hover:shadow-md">
                            <img src="{{asset('frontend/images/user1.JPG')}}" alt="Website Logo 6" class="h-10 w-auto opacity-80 hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <!-- Logo 7 -->
                    <div class="flex items-center justify-center">
                        <div class="border border-gray-200 rounded-lg p-2 transition-all duration-300 hover:border-blue-300 hover:shadow-md">
                            <img src="{{asset('frontend/images/user2.JPG')}}" alt="Website Logo 7" class="h-10 w-auto opacity-80 hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <!-- Logo 8 -->
                    <div class="flex items-center justify-center">
                        <div class="border border-gray-200 rounded-lg p-2 transition-all duration-300 hover:border-blue-300 hover:shadow-md">
                            <img src="{{asset('frontend/images/user1.JPG')}}" alt="Website Logo 8" class="h-10 w-auto opacity-80 hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <!-- Logo 9 -->
                    <div class="flex items-center justify-center">
                        <div class="border border-gray-200 rounded-lg p-2 transition-all duration-300 hover:border-blue-300 hover:shadow-md">
                            <img src="{{asset('frontend/images/user2.JPG')}}" alt="Website Logo 9" class="h-10 w-auto opacity-80 hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <!-- Logo 10 -->
                    <div class="flex items-center justify-center">
                        <div class="border border-gray-200 rounded-lg p-2 transition-all duration-300 hover:border-blue-300 hover:shadow-md">
                            <img src="{{asset('frontend/images/user1.JPG')}}" alt="Website Logo 10" class="h-10 w-auto opacity-80 hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
<footer class="bg-gradient-to-r from-blue-600 to-indigo-600 py-12 text-white">
    <div class="max-w-[90%] mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
            <!-- Brand and Description -->
            <div>
                <div class="flex items-center justify-center md:justify-start space-x-3 mb-4">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md">
                        <div class="w-6 h-6 bg-blue-500 rounded-md transform rotate-45"></div>
                    </div>
                    <span class="text-2xl font-extrabold text-white tracking-tight">ToolBox</span>
                </div>
                <p class="text-gray-200 text-sm leading-relaxed">
                    Empowering your productivity with cutting-edge tools for SEO, utilities, and more. Join our community today!
                </p>
            </div>

            <!-- Useful Links -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Useful Links</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-200 hover:text-yellow-300 transition duration-200">Home</a></li>
                    <li><a href="#tools" class="text-gray-200 hover:text-yellow-300 transition duration-200">Tools</a></li>
                    <li><a href="#" class="text-gray-200 hover:text-yellow-300 transition duration-200">Pricing</a></li>
                    <li><a href="#" class="text-gray-200 hover:text-yellow-300 transition duration-200">Sign Up</a></li>
                    <li><a href="#" class="text-gray-200 hover:text-yellow-300 transition duration-200">Contact Us</a></li>
                </ul>
            </div>

            <!-- Social Media -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Follow Us</h3>
                <div class="flex justify-center md:justify-start space-x-4">
                    <!-- Twitter -->
                    <a href="https://twitter.com" target="_blank" class="text-gray-200 hover:text-yellow-300 transition duration-200">
                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>
                        </svg>
                    </a>
                    <!-- Facebook -->
                    <a href="https://facebook.com" target="_blank" class="text-gray-200 hover:text-yellow-300 transition duration-200">
                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M24 4.56v14.88A4.56 4.56 0 0119.44 24H4.56A4.56 4.56 0 010 19.44V4.56A4.56 4.56 0 014.56 0h14.88A4.56 4.56 0 0124 4.56zM14.59 12h-2.1v7.68h-3.07V12H8V9.41h1.42V7.68c0-1.42.85-2.68 2.17-2.68h1.75v2.59h-1.25c-.41 0-.67.34-.67.68v1.74h1.92L14.59 12z"/>
                        </svg>
                    </a>
                    <!-- Instagram -->
                    <a href="https://instagram.com" target="_blank" class="text-gray-200 hover:text-yellow-300 transition duration-200">
                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12 2.16c3.2 0 3.58.01 4.85.07 1.27.06 2.14.26 2.9.56.78.3 1.44.7 2.1 1.36.66.66 1.06 1.32 1.36 2.1.3.76.5 1.63.56 2.9.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.06 1.27-.26 2.14-.56 2.9-.3.78-.7 1.44-1.36 2.1-.66.66-1.32 1.06-2.1 1.36-.76.3-1.63.5-2.9.56-1.27.06-1.65.07-4.85.07s-3.58-.01-4.85-.07c-1.27-.06-2.14-.26-2.9-.56-.78-.3-1.44-.7-2.1-1.36-.66-.66-1.06-1.32-1.36-2.1-.3-.76-.5-1.63-.56-2.9C2.17 15.58 2.16 15.2 2.16 12s.01-3.58.07-4.85c.06-1.27.26-2.14.56-2.9.3-.78.7-1.44 1.36-2.1.66-.66 1.32-1.06 2.1-1.36.76-.3 1.63-.5 2.9-.56C8.42 2.17 8.8 2.16 12 2.16zm0 2.7a9.3 9.3 0 00-9.3 9.3 9.3 9.3 0 009.3 9.3 9.3 9.3 0 009.3-9.3 9.3 9.3 0 00-9.3-9.3zm0 15.3a6 6 0 110-12 6 6 0 010 12zm6.9-12.9a1.2 1.2 0 11-2.4 0 1.2 1.2 0 012.4 0z"/>
                        </svg>
                    </a>
                    <!-- LinkedIn -->
                    <a href="https://linkedin.com" target="_blank" class="text-gray-200 hover:text-yellow-300 transition duration-200">
                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M20.45 0H3.55A3.55 3.55 0 000 3.55v16.9A3.55 3.55 0 003.55 24h16.9A3.55 3.55 0 0024 20.45V3.55A3.55 3.55 0 0020.45 0zM8.52 20.45H5.66V9.5h2.86v10.95zM7.09 8.32a1.66 1.66 0 110-3.32 1.66 1.66 0 010 3.32zm13.36 12.13h-2.86v-5.8c0-1.38-.5-2.32-1.74-2.32-1 0-1.6.67-1.86 1.32-.1.23-.12.55-.12.88v6.92H11V9.5h2.74v1.5h.04c.38-.72 1.3-1.5 2.67-1.5 1.9 0 3.36 1.24 3.36 3.9v7.05z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="mt-8 text-center text-gray-200 text-sm border-t border-gray-500 pt-4">
            <p>© 2025 ToolBox. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>