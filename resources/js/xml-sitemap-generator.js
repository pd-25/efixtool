document.addEventListener('DOMContentLoaded', function () {
    const generateBtn = document.getElementById('generateSitemapBtn');
    const copyBtn = document.getElementById('copySitemapBtn');
    const urlInput = document.getElementById('urlInput');
    const sitemapOutput = document.getElementById('sitemapOutput');
    const loader = document.getElementById('loader');
    const sitemapResult = document.getElementById('sitemapResult');

    generateBtn.addEventListener('click', function () {
        const url = urlInput.value;

        if (!url) {
            alert('Please enter a URL.');
            return;
        }

        loader.style.display = 'block';
        sitemapResult.style.display = 'none';

        fetch('/api/generate-sitemap', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ url: url })
        })
        .then(response => response.text())
        .then(data => {
            loader.style.display = 'none';
            sitemapOutput.value = data;
            sitemapResult.style.display = 'block';
        })
        .catch(error => {
            loader.style.display = 'none';
            alert('An error occurred while generating the sitemap.');
            console.error('Error:', error);
        });
    });

    copyBtn.addEventListener('click', function () {
        sitemapOutput.select();
        document.execCommand('copy');
        alert('Sitemap copied to clipboard!');
    });
});
