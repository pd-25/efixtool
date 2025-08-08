@extends('frontend.layouts.tools')
@section('pagetitle', 'Favicon Generator Tool')
@section('toolsContent')
<div class="max-w-7xl mx-auto">
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-8">
        <h2 class="text-2xl font-semibold mb-4 text-gray-900">Upload Image to Generate Favicons</h2>
        <div class="mb-6">
            <input type="file" id="imageUpload" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
        </div>

        <div id="previewArea" class="mb-6 hidden">
            <h3 class="text-xl font-semibold mb-3 text-gray-800">Image Preview</h3>
            <canvas id="imageCanvas" class="border border-gray-300 rounded-lg max-w-full h-auto"></canvas>
        </div>

        <div id="faviconOutput" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 mb-6 hidden">
            <!-- Favicons will be generated here -->
        </div>

        <div id="downloadSection" class="mt-6 hidden">
            <h3 class="text-xl font-semibold mb-3 text-gray-800">Download Favicons</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4" id="downloadLinks">
                <!-- Download links will be appended here -->
            </div>
        </div>
    </div>

    <section class="mb-12 bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-900">About the Favicon Generator</h2>
        <p class="text-gray-700 leading-relaxed">
            This tool allows you to easily generate favicons from any image. Upload your image, and the tool will automatically create favicons in various standard sizes, ready for use on your website.
        </p>
    </section>

    <section class="mb-12">
        <button class="accordion-button w-full bg-gray-800 text-white p-4 rounded-t-lg text-left text-xl font-semibold">How to Use</button>
        <div class="accordion-content max-h-0 bg-white rounded-b-lg p-6">
            <ul class="list-disc list-inside text-gray-700">
                <li>Select an image file (PNG, JPG, GIF) using the "Upload Image" button.</li>
                <li>The image will be displayed in the preview area.</li>
                <li>Favicons in various sizes will be automatically generated below the preview.</li>
                <li>Click on the download links to save the favicons to your device.</li>
            </ul>
        </div>
    </section>

    <section class="mb-12 bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-900">Why Favicons Matter</h2>
        <p class="text-gray-700 leading-relaxed">
            Favicons are small icons that appear in browser tabs, bookmarks, and search results. They enhance brand recognition, improve user experience, and make your website look more professional.
        </p>
    </section>
</div>

@endsection
