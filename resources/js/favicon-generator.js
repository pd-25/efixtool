document.addEventListener('DOMContentLoaded', () => {
    const imageUpload = document.getElementById('imageUpload');
    const imageCanvas = document.getElementById('imageCanvas');
    const ctx = imageCanvas.getContext('2d');
    const previewArea = document.getElementById('previewArea');
    const faviconOutput = document.getElementById('faviconOutput');
    const downloadSection = document.getElementById('downloadSection');
    const downloadLinks = document.getElementById('downloadLinks');

    const faviconSizes = [16, 32, 48, 64, 128, 256]; // Standard favicon sizes

    imageUpload.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = (e) => {
            const img = new Image();
            img.onload = () => {
                // Display original image in canvas for preview
                imageCanvas.width = img.width;
                imageCanvas.height = img.height;
                ctx.clearRect(0, 0, imageCanvas.width, imageCanvas.height);
                ctx.drawImage(img, 0, 0);
                previewArea.classList.remove('hidden');

                // Clear previous favicons and download links
                faviconOutput.innerHTML = '';
                downloadLinks.innerHTML = '';
                faviconOutput.classList.remove('hidden');
                downloadSection.classList.remove('hidden');

                // Generate favicons for each size
                faviconSizes.forEach(size => {
                    generateFavicon(img, size);
                });
            };
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    });

    function generateFavicon(img, size) {
        const canvas = document.createElement('canvas');
        canvas.width = size;
        canvas.height = size;
        const context = canvas.getContext('2d');

        // Draw image centered and scaled to fit
        const aspectRatio = img.width / img.height;
        let drawWidth = size;
        let drawHeight = size;
        let offsetX = 0;
        let offsetY = 0;

        if (img.width > img.height) {
            drawHeight = size / aspectRatio;
            offsetY = (size - drawHeight) / 2;
        } else {
            drawWidth = size * aspectRatio;
            offsetX = (size - drawWidth) / 2;
        }

        context.drawImage(img, offsetX, offsetY, drawWidth, drawHeight);

        // Append favicon preview
        const faviconDiv = document.createElement('div');
        faviconDiv.className = 'flex flex-col items-center p-2 bg-gray-50 rounded-lg shadow-sm';
        faviconDiv.innerHTML = `
            <img src="${canvas.toDataURL('image/png')}" alt="Favicon ${size}x${size}" class="w-16 h-16 mb-2 border border-gray-200 rounded">
            <p class="text-sm text-gray-700">${size}x${size}px</p>
        `;
        faviconOutput.appendChild(faviconDiv);

        // Append download link
        const downloadDiv = document.createElement('div');
        downloadDiv.className = 'p-2 bg-gray-50 rounded-lg shadow-sm flex items-center justify-between';
        const downloadLink = document.createElement('a');
        downloadLink.href = canvas.toDataURL('image/png');
        downloadLink.download = `favicon-${size}x${size}.png`;
        downloadLink.className = 'bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 transition duration-200 text-sm';
        downloadLink.textContent = `Download ${size}x${size} PNG`;
        downloadDiv.appendChild(downloadLink);
        downloadLinks.appendChild(downloadDiv);
    }

    // Accordion functionality
    const accordionButtons = document.querySelectorAll('.accordion-button');
    accordionButtons.forEach(button => {
        button.addEventListener('click', () => {
            const content = button.nextElementSibling;
            button.classList.toggle('active');
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                content.style.paddingTop = '0';
                content.style.paddingBottom = '0';
            } else {
                content.style.maxHeight = content.scrollHeight + 'px';
                content.style.paddingTop = '1.5rem'; // p-6
                content.style.paddingBottom = '1.5rem'; // p-6
            }
        });
    });
});
