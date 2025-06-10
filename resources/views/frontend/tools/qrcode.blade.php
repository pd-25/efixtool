@extends('frontend.layouts.tools')
@section('pagetitle', 'Advanced QR Code Generator')
@section('toolsContent')

<div class="max-w-7xl w-full mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Left: Input Form -->
        <div class="md:col-span-2 bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
            <!-- Tabs -->
            <div class="gradient-bg tab flex overflow-x-auto p-2 gap-2">
                <button class="tab-btn active text-white px-4 py-2 rounded-lg" onclick="showTab('url')">
                    <i class="fas fa-link mr-1"></i> URL
                </button>
                <button class="tab-btn text-white px-4 py-2 rounded-lg" onclick="showTab('contact')">
                    <i class="fas fa-address-book mr-1"></i> Contact
                </button>
                <button class="tab-btn text-white px-4 py-2 rounded-lg" onclick="showTab('social')">
                    <i class="fas fa-users mr-1"></i> Social
                </button>
                <button class="tab-btn text-white px-4 py-2 rounded-lg" onclick="showTab('plainText')">
                    <i class="fas fa-text-height mr-1"></i> Text
                </button>
                <button class="tab-btn text-white px-4 py-2 rounded-lg" onclick="showTab('wifi')">
                    <i class="fas fa-wifi mr-1"></i> WiFi
                </button>
                <button class="tab-btn text-white px-4 py-2 rounded-lg" onclick="showTab('sms')">
                    <i class="fas fa-sms mr-1"></i> SMS
                </button>
            </div>

            <!-- Tab Content -->
            <div class="p-6">
                <div id="urlTab" class="tab-content">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Web URL QR Code</h3>
                    <div class="relative mb-4">
                        <input type="text" id="urlInput" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="https://example.com" value="https://example.com" oninput="updateQRCode()">
                    </div>
                </div>
                
                <div id="contactTab" class="tab-content hidden">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Contact QR Code (vCard)</h3>
                    <input type="text" id="contactName" class="w-full p-3 border rounded-lg mb-4 focus:ring-2 focus:ring-indigo-500" placeholder="Full Name" oninput="updateQRCode()">
                    <input type="tel" id="contactPhone" class="w-full p-3 border rounded-lg mb-4 focus:ring-2 focus:ring-indigo-500" placeholder="Phone Number" oninput="updateQRCode()">
                    <input type="email" id="contactEmail" class="w-full p-3 border rounded-lg mb-4 focus:ring-2 focus:ring-indigo-500" placeholder="Email" oninput="updateQRCode()">
                    <input type="text" id="contactCompany" class="w-full p-3 border rounded-lg mb-4 focus:ring-2 focus:ring-indigo-500" placeholder="Company" oninput="updateQRCode()">
                    <input type="text" id="contactTitle" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="Job Title" oninput="updateQRCode()">
                </div>
                
                <div id="socialTab" class="tab-content hidden">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Social Media QR Code</h3>
                    <input type="text" id="socialFacebook" class="w-full p-3 border rounded-lg mb-4 focus:ring-2 focus:ring-indigo-500" placeholder="Facebook URL" oninput="updateQRCode()">
                    <input type="text" id="socialInstagram" class="w-full p-3 border rounded-lg mb-4 focus:ring-2 focus:ring-indigo-500" placeholder="Instagram URL" oninput="updateQRCode()">
                    <input type="text" id="socialLinkedIn" class="w-full p-3 border rounded-lg mb-4 focus:ring-2 focus:ring-indigo-500" placeholder="LinkedIn URL" oninput="updateQRCode()">
                    <input type="text" id="socialTwitter" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="Twitter/X URL" oninput="updateQRCode()">
                </div>
                
                <div id="plainTextTab" class="tab-content hidden">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Text QR Code</h3>
                    <textarea id="plainTextInput" rows="4" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="Enter your text..." oninput="updateQRCode()"></textarea>
                </div>
                
                <div id="wifiTab" class="tab-content hidden">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">WiFi QR Code</h3>
                    <select id="wifiEncryption" class="w-full p-3 border rounded-lg mb-4 focus:ring-2 focus:ring-indigo-500" onchange="updateQRCode()">
                        <option value="WPA">WPA/WPA2</option>
                        <option value="WEP">WEP</option>
                        <option value="">None</option>
                    </select>
                    <input type="text" id="wifiSSID" class="w-full p-3 border rounded-lg mb-4 focus:ring-2 focus:ring-indigo-500" placeholder="Network Name (SSID)" oninput="updateQRCode()">
                    <input type="password" id="wifiPassword" class="w-full p-3 border rounded-lg mb-4 focus:ring-2 focus:ring-indigo-500" placeholder="Password" oninput="updateQRCode()">
                    <div class="flex items-center">
                        <input type="checkbox" id="wifiHidden" class="mr-2" onchange="updateQRCode()">
                        <label for="wifiHidden">Hidden Network</label>
                    </div>
                </div>
                
                <div id="smsTab" class="tab-content hidden">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">SMS QR Code</h3>
                    <input type="tel" id="smsNumber" class="w-full p-3 border rounded-lg mb-4 focus:ring-2 focus:ring-indigo-500" placeholder="Phone Number" oninput="updateQRCode()">
                    <textarea id="smsMessage" rows="2" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="Message" oninput="updateQRCode()"></textarea>
                </div>

                <!-- Enhanced QR Code Customization -->
                <div class="mt-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">QR Code Design</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Colors Section -->
                        <div class="border p-4 rounded-lg">
                            <h4 class="font-medium text-gray-700 mb-3">Colors</h4>
                            <div class="space-y-3">
                                {{-- <div>
                                    <label class="block text-sm text-gray-600 mb-1">Main Color</label>
                                    <input type="color" id="qrColor" class="w-full h-10 rounded-lg cursor-pointer" value="#000000" onchange="updateQRCode()">
                                </div> --}}
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Background Color</label>
                                    <input type="color" id="qrBgColor" class="w-full h-10 rounded-lg cursor-pointer" value="#ffffff" onchange="updateQRCode()">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Eye Ball Color</label>
                                    <input type="color" id="qrEyeBallColor" class="w-full h-10 rounded-lg cursor-pointer" value="#000000" onchange="updateQRCode()">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Eye Frame Color</label>
                                    <input type="color" id="qrEyeFrameColor" class="w-full h-10 rounded-lg cursor-pointer" value="#000000" onchange="updateQRCode()">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pattern Section -->
                        <div class="border p-4 rounded-lg">
                            <h4 class="font-medium text-gray-700 mb-3">Pattern & Style</h4>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Pattern Type</label>
                                    <select id="qrPatternType" class="w-full p-2 border rounded-lg" onchange="updateQRCode()">
                                        <option value="square">Square</option>
                                        <option value="dots">Dots</option>
                                        <option value="rounded">Rounded</option>
                                        <option value="classy">Classy</option>
                                        <option value="extra-rounded">Extra Rounded</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Eye Shape</label>
                                    <select id="qrEyeShape" class="w-full p-2 border rounded-lg" onchange="updateQRCode()">
                                        <option value="square">Square</option>
                                        <option value="circle">Circle</option>
                                        <option value="rounded">Rounded</option>
                                        <option value="leaf">Leaf</option>
                                        <option value="diamond">Diamond</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Pattern Color</label>
                                    <input type="color" id="qrPatternColor" class="w-full h-10 rounded-lg cursor-pointer" value="#000000" onchange="updateQRCode()">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Size & Error Correction -->
                        <div class="border p-4 rounded-lg">
                            <h4 class="font-medium text-gray-700 mb-3">Settings</h4>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Error Correction</label>
                                    <select id="qrErrorCorrection" class="w-full p-2 border rounded-lg" onchange="updateQRCode()">
                                        <option value="L">Low (7%)</option>
                                        <option value="M" selected>Medium (15%)</option>
                                        <option value="Q">Quartile (25%)</option>
                                        <option value="H">High (30%)</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Download Size</label>
                                    <select id="qrDownloadSize" class="w-full p-2 border rounded-lg">
                                        <option value="300">Small (300×300)</option>
                                        <option value="500" selected>Medium (500×500)</option>
                                        <option value="800">Large (800×800)</option>
                                        <option value="1000">Extra Large (1000×1000)</option>
                                        <option value="1500">HD (1500×1500)</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Margin</label>
                                    <input type="range" id="qrMargin" min="0" max="20" value="4" class="w-full" oninput="updateQRCode()">
                                    <div class="flex justify-between text-xs text-gray-500">
                                        <span>0</span>
                                        <span>10</span>
                                        <span>20</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Logo & Effects -->
                        <div class="border p-4 rounded-lg">
                            <h4 class="font-medium text-gray-700 mb-3">Logo & Effects</h4>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Add Logo</label>
                                    <input type="file" id="logoInput" accept="image/*" class="w-full p-1 border rounded-lg" onchange="handleLogoUpload()">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Logo Size (Safe: 15-20%)</label>
                                    <input type="range" id="logoSize" min="5" max="30" value="15" class="w-full" oninput="updateQRCode()">
                                    <div class="flex justify-between text-xs text-gray-500">
                                        <span>5%</span>
                                        <span>15%</span>
                                        <span>30%</span>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Background Pattern</label>
                                    <select id="qrBackgroundPattern" class="w-full p-2 border rounded-lg" onchange="updateQRCode()">
                                        <option value="none">None</option>
                                        <option value="dots">Dots</option>
                                        <option value="grid">Grid</option>
                                        <option value="diagonal">Diagonal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="errorMessage" class="text-red-500 mt-4 hidden"></div>
            </div>
        </div>

        <!-- Right: QR Preview -->
        <div class="md:col-span-1 bg-white rounded-2xl shadow-xl border border-gray-200 p-6 flex flex-col items-center">
            <div class="mb-4 w-full text-center">
                <h3 class="text-lg font-semibold text-gray-800">QR Code Preview</h3>
                <p class="text-sm text-gray-500">Scan to test before download</p>
            </div>
            
            <div id="qrCode" class="mb-6 flex items-center justify-center p-4 bg-white rounded-lg shadow-sm" style="width: 250px; height: 250px;">
                <!-- QR code will be generated here -->
            </div>
            
            <div class="w-full space-y-3">
                <button onclick="downloadQRCode('png')" class="w-full bg-indigo-600 text-white px-4 py-3 rounded-lg hover:bg-indigo-700 transition flex items-center justify-center">
                    <i class="fas fa-download mr-2"></i> Download PNG
                </button>
                <button onclick="downloadQRCode('svg')" class="w-full bg-purple-600 text-white px-4 py-3 rounded-lg hover:bg-purple-700 transition flex items-center justify-center">
                    <i class="fas fa-download mr-2"></i> Download SVG
                </button>
                <button onclick="downloadQRCode('jpeg')" class="w-full bg-green-600 text-white px-4 py-3 rounded-lg hover:bg-green-700 transition flex items-center justify-center">
                    <i class="fas fa-download mr-2"></i> Download JPEG
                </button>
            </div>
            
            <div class="mt-4 text-center text-sm text-gray-500">
                <p>Supports all standard QR scanners</p>
                <p class="text-xs mt-1">For best results, keep logo under 20%</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.1/build/qrcode.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/qr-code-styling@1.5.0/lib/qr-code-styling.min.js"></script>
<style>
    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .tab-btn {
        transition: all 0.3s ease;
        white-space: nowrap;
    }
    .tab-btn:hover {
        transform: translateY(-2px);
        background: rgba(255, 255, 255, 0.1);
    }
    .tab-btn.active {
        background: rgba(255, 255, 255, 0.2);
        border-bottom: 3px solid white;
    }
    #qrCode {
        min-height: 250px;
        min-width: 250px;
        background-color: white;
        border: 1px solid #e5e7eb;
    }
</style>
<script>
    let currentTab = 'url';
    let logoImage = null;
    let qrCode = null;

    // Initialize QR code styling library
    document.addEventListener('DOMContentLoaded', function() {
        qrCode = new QRCodeStyling({
            width: 250,
            height: 250,
            margin: 4,
            data: "https://example.com",
            qrOptions: {
                typeNumber: 0,
                mode: "Byte",
                errorCorrectionLevel: "M"
            },
            imageOptions: {
                hideBackgroundDots: true,
                imageSize: 0.15,
                margin: 0
            },
            dotsOptions: {
                type: "square",
                color: "#000000"
            },
            cornersSquareOptions: {
                type: "square",
                color: "#000000"
            },
            cornersDotOptions: {
                type: "square",
                color: "#000000"
            }
        });
        
        qrCode.append(document.getElementById("qrCode"));
        updateQRCode();
    });

    function showTab(tab) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        document.getElementById(`${tab}Tab`).classList.remove('hidden');
        document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');
        currentTab = tab;
        updateQRCode();
    }

    function handleLogoUpload() {
        const file = document.getElementById('logoInput').files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                logoImage = e.target.result;
                updateQRCode();
            };
            reader.readAsDataURL(file);
        } else {
            logoImage = null;
            updateQRCode();
        }
    }

    function getQRData() {
        let data = '';
        switch (currentTab) {
            case 'url': 
                data = document.getElementById('urlInput').value;
                return data && data.trim() ? data : null;
                
            case 'contact': 
                const name = document.getElementById('contactName').value;
                const phone = document.getElementById('contactPhone').value;
                const email = document.getElementById('contactEmail').value;
                const company = document.getElementById('contactCompany').value;
                const title = document.getElementById('contactTitle').value;
                data = `BEGIN:VCARD\nVERSION:3.0\nN:${name || ''}\nTEL:${phone || ''}\nEMAIL:${email || ''}\nORG:${company || ''}\nTITLE:${title || ''}\nEND:VCARD`;
                return (name || phone || email || company || title) ? data : null;
                
            case 'social': 
                const facebook = document.getElementById('socialFacebook').value;
                const instagram = document.getElementById('socialInstagram').value;
                const linkedin = document.getElementById('socialLinkedIn').value;
                const twitter = document.getElementById('socialTwitter').value;
                data = {
                    facebook: facebook || '',
                    instagram: instagram || '',
                    linkedin: linkedin || '',
                    twitter: twitter || ''
                };
                return (facebook || instagram || linkedin || twitter) ? JSON.stringify(data) : null;
                
            case 'plainText': 
                data = document.getElementById('plainTextInput').value;
                return data && data.trim() ? data : null;
                
            case 'wifi':
                const encryption = document.getElementById('wifiEncryption').value;
                const ssid = document.getElementById('wifiSSID').value;
                const password = document.getElementById('wifiPassword').value;
                const hidden = document.getElementById('wifiHidden').checked;
                if (!ssid) return null;
                data = `WIFI:T:${encryption};S:${ssid};P:${password};H:${hidden};`;
                return data;
                
            case 'sms':
                const number = document.getElementById('smsNumber').value;
                const message = document.getElementById('smsMessage').value;
                if (!number) return null;
                data = `SMSTO:${number}:${message || ''}`;
                return data;
        }
    }

    function updateQRCode() {
        const data = getQRData();
        const errorDiv = document.getElementById('errorMessage');
        
        // Clear error
        errorDiv.classList.add('hidden');

        if (!data) {
            errorDiv.classList.remove('hidden');
            errorDiv.textContent = 'Please enter valid data to generate QR code';
            return;
        }

        // Get all customization options
        const options = {
            width: 250,
            height: 250,
            data: data,
            margin: parseInt(document.getElementById('qrMargin').value),
            qrOptions: {
                typeNumber: 0,
                mode: "Byte",
                errorCorrectionLevel: document.getElementById('qrErrorCorrection').value
            },
            dotsOptions: {
                type: document.getElementById('qrPatternType').value,
                color: document.getElementById('qrPatternColor').value
            },
            cornersSquareOptions: {
                type: document.getElementById('qrEyeShape').value,
                color: document.getElementById('qrEyeFrameColor').value
            },
            cornersDotOptions: {
                type: document.getElementById('qrEyeShape').value,
                color: document.getElementById('qrEyeBallColor').value
            },
            backgroundOptions: {
                color: document.getElementById('qrBgColor').value
            },
            imageOptions: {
                hideBackgroundDots: true,
                imageSize: parseInt(document.getElementById('logoSize').value) / 100,
                margin: 5,
                crossOrigin: "anonymous"
            }
        };

        // Update with logo if exists
        if (logoImage) {
            options.image = logoImage;
        } else {
            options.image = undefined;
        }

        // Apply the new options
        qrCode.update(options);
    }

    async function downloadQRCode(format) {
        const size = parseInt(document.getElementById('qrDownloadSize').value);
        const data = getQRData();

        if (!data) {
            document.getElementById('errorMessage').classList.remove('hidden');
            document.getElementById('errorMessage').textContent = 'Please enter valid data to download QR code';
            return;
        }

        try {
            // Create a temporary canvas with the desired download size
            const canvas = document.createElement('canvas');
            canvas.width = size;
            canvas.height = size;
            const ctx = canvas.getContext('2d');
            
            // Fill with background color
            ctx.fillStyle = document.getElementById('qrBgColor').value;
            ctx.fillRect(0, 0, size, size);
            
            // Get current QR code as image data
            const qrCanvas = await qrCode.getCanvas();
            
            // Calculate scaling factor
            const scale = size / 250; // 250 is our preview size
            
            // Draw the QR code scaled up
            ctx.drawImage(qrCanvas, 0, 0, size, size);
            
            // Create download link
            const link = document.createElement('a');
            link.download = `qrcode.${format}`;
            
            if (format === 'svg') {
                // For SVG we need to generate a new one with correct size
                const svgOptions = {...qrCode._options};
                svgOptions.width = size;
                svgOptions.height = size;
                
                const svg = await qrCode._getSVG(svgOptions);
                link.href = 'data:image/svg+xml,' + encodeURIComponent(svg);
            } else {
                link.href = canvas.toDataURL(`image/${format}`);
            }
            
            link.click();
        } catch (err) {
            console.error('Download failed:', err);
            document.getElementById('errorMessage').classList.remove('hidden');
            document.getElementById('errorMessage').textContent = 'Failed to download QR code. Please try again.';
        }
    }
</script>
@endsection