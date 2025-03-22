@extends('frontend.layouts.tools')
@section('pagetitle', 'Character Count Tool')
@section('toolsContent')
<div class="max-w-7xl mx-auto">
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-8">
        <div class="flex flex-wrap gap-4 mb-6">
            <div class="flex flex-wrap gap-2 w-full">
                <button data-type="general" class="content-type-btn bg-gray-200 text-gray-900 px-3 py-1 rounded-lg hover:bg-gray-300 active:bg-blue-600 active:text-white">General Text</button>
                <button data-type="metaTitle" class="content-type-btn bg-gray-200 text-gray-900 px-3 py-1 rounded-lg hover:bg-gray-300 active:bg-blue-600 active:text-white">Meta Title</button>
                <button data-type="metaDescription" class="content-type-btn bg-gray-200 text-gray-900 px-3 py-1 rounded-lg hover:bg-gray-300 active:bg-blue-600 active:text-white">Meta Description</button>
                <button data-type="facebook" class="content-type-btn bg-gray-200 text-gray-900 px-3 py-1 rounded-lg hover:bg-gray-300 active:bg-blue-600 active:text-white">Facebook</button>
                <button data-type="instagram" class="content-type-btn bg-gray-200 text-gray-900 px-3 py-1 rounded-lg hover:bg-gray-300 active:bg-blue-600 active:text-white">Instagram</button>
                <button data-type="x" class="content-type-btn bg-gray-200 text-gray-900 px-3 py-1 rounded-lg hover:bg-gray-300 active:bg-blue-600 active:text-white">X</button>
            </div>
        </div>
        <div class="relative flex flex-col sm:flex-row gap-4 mb-6">

            <input id="urlInput" class="w-full md:w-5/6 p-2 border border-gray-300 rounded-lg " placeholder="Enter URL to analyze (optional)">
            <button id="analyzeUrlBtn" class="lg:w-1/6 w-full bg-yellow-400 text-gray-900 text-gray-900 px-4 py-2 rounded-lg shadow-md hover:bg-yellow-500 hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105 flex items-center space-x-2 justify-center">Analyze URL</button>
            
        </div>
        <div class=" flex flex-col md:flex-row gap-4 mb-6">
            <div class="relative w-full md:w-5/6">
                <textarea id="textInput" rows="9" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y" placeholder="Type or paste your text here..."></textarea>
                <div id="loader" class="hidden absolute inset-0 flex items-center justify-center bg-gray-200 bg-opacity-50 rounded-lg">
                    <i class="fas fa-fan fa-spin text-yellow-400 text-2xl"></i>
                </div>
            </div>
            <div class="w-full md:w-1/6">
                <div class="flex flex-wrap gap-3">
                    
                    <button id="copyTextBtn" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-200 flex items-center space-x-2 w-full justify-center">
                        <i class="fas fa-copy"></i><span>Copy Text</span>
                    </button>
                    
                    <button id="upperCaseBtn" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-200 flex items-center space-x-2 w-full justify-center">
                        <i class="fas fa-arrow-up"></i><span>Uppercase</span>
                    </button>
                    <button id="lowerCaseBtn" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-200 flex items-center space-x-2 w-full justify-center">
                        <i class="fas fa-arrow-down"></i><span>Lowercase</span>
                    </button>
                    <button id="capitalizeBtn" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-200 flex items-center space-x-2 w-full justify-center">
                        <i class="fas fa-text-height"></i><span>Capitalize</span>
                        <button id="clearTextBtn" class="bg-gray-200 text-gray-900 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-200 flex items-center space-x-2 w-full justify-center">
                            <i class="fas fa-trash"></i><span>Clear</span>
                        </button>
                    </button>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mt-6 mb-6">
            <div class="text-center p-4 bg-gray-50 rounded-lg">
                <p class="text-2xl font-semibold text-gray-900" id="charCount">0</p>
                <p class="text-gray-600">Characters</p>
            </div>
            <div class="text-center p-4 bg-gray-50 rounded-lg">
                <p class="text-2xl font-semibold text-gray-900" id="wordCount">0</p>
                <p class="text-gray-600">Words</p>
            </div>
            <div class="text-center p-4 bg-gray-50 rounded-lg">
                <p class="text-2xl font-semibold text-gray-900" id="sentenceCount">0</p>
                <p class="text-gray-600">Sentences</p>
            </div>
            <div class="text-center p-4 bg-gray-50 rounded-lg">
                <p class="text-2xl font-semibold text-gray-900" id="readingTime">0 sec</p>
                <p class="text-gray-600">Reading Time</p>
            </div>
            
        </div>
        <div class="ml-1 w-full ">
            <div id="metaTitleSection" class="hidden">
                <div class="flex justify-between items-center ">
                    <p class="text-gray-700 font-medium  mb-2">Meta Title Characters (60-70 chars)</p>
                    <p class="text-gray-600" id="metaTitleCount">0/70</p>
                </div>
                <div class="progress-bar">
                    <div id="metaTitleBar" class="progress-bar-fill bg-blue-600" style="width: 0%;"></div>
                </div>
            </div>
            <div id="metaDescSection" class="hidden">
                <div class="flex justify-between items-center "> 
                    <p class="text-gray-700 font-medium   mb-2">Meta Description Characters (150-160 chars)</p>
                    <p class="text-gray-600" id="metaDescCount">0/160</p>
                </div>
                <div class="progress-bar">
                    <div id="metaDescBar" class="progress-bar-fill bg-indigo-600" style="width: 0%;"></div>
                </div>
            </div>
            <div id="facebookSection" class="hidden">
                <div class="flex justify-between items-center ">
                    <p class="text-gray-700 font-medium  mb-2">Facebook Post Characters (optimal 40-80)</p>
                    <p class="text-gray-600" id="facebookCount">0/80</p>
                </div>
                <div class="progress-bar">
                    <div id="facebookBar" class="progress-bar-fill bg-blue-800" style="width: 0%;"></div>
                </div>
            </div>
            <div id="instagramSection" class="hidden">
                <div class="flex justify-between items-center ">
                    <p class="text-gray-700 font-medium  mb-2">Instagram Post Characters (optimal 125-150)</p>
                    <p class="text-gray-600" id="instagramCount">0/150</p>
                </div>
                <div class="progress-bar">
                    <div id="instagramBar" class="progress-bar-fill bg-pink-600" style="width: 0%;"></div>
                </div>
            </div>
            <div id="xSection" class="hidden">
                <div class="flex justify-between items-center ">
                    <p class="text-gray-700 font-medium  mb-2">X Post Characters (280 chars)</p>
                    <p class="text-gray-600" id="xCount">0/280</p>
                </div>
                <div class="progress-bar">
                    <div id="xBar" class="progress-bar-fill bg-gray-900" style="width: 0%;"></div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection