@extends('frontend.layouts.tools')
@section('pagetitle', 'Home')
@section('toolsContent')
<div class="max-w-7xl mx-auto">
        <!-- Generic Tools -->
        <div class="">
            <h2 class="text-xl md:text-2xl font-semibold text-gray-900 mb-8 text-left animate-fade-in border-l-4 border-gray-900 pl-3">
                Generic Tools
            </h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-blue-500 transition-all duration-300 flex flex-col items-center text-center group relative">
                    <div class="w-14 h-14 bg-blue-100 rounded-full mb-4 flex items-center justify-center transform group-hover:scale-110 transition duration-300">
                        <span class="text-blue-600 font-bold text-lg">CC</span>
                    </div>
                    <p class="text-md font-semibold text-gray-800">Character Counter</p>
                    
                </div>
                <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-blue-500 transition-all duration-300 flex flex-col items-center text-center group relative">
                    <div class="w-14 h-14 bg-blue-100 rounded-full mb-4 flex items-center justify-center transform group-hover:scale-110 transition duration-300">
                        <span class="text-blue-600 font-bold text-lg">QR</span>
                    </div>
                    <p class="text-md font-semibold">QR Code Generator</p>
                    
                </div>
              
            </div>
        </div>

    
    </div>
</div>
@endsection