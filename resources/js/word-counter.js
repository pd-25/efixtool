document.addEventListener('DOMContentLoaded', () => {
    const textInput = document.getElementById('textInput');
    const urlInput = document.getElementById('urlInput');
    const charCount = document.getElementById('charCount');
    const wordCount = document.getElementById('wordCount');
    const sentenceCount = document.getElementById('sentenceCount');
    const readingTime = document.getElementById('readingTime');
    const metaTitleCount = document.getElementById('metaTitleCount');
    const metaDescCount = document.getElementById('metaDescCount');
    const facebookCount = document.getElementById('facebookCount');
    const instagramCount = document.getElementById('instagramCount');
    const xCount = document.getElementById('xCount');
    const metaTitleBar = document.getElementById('metaTitleBar');
    const metaDescBar = document.getElementById('metaDescBar');
    const facebookBar = document.getElementById('facebookBar');
    const instagramBar = document.getElementById('instagramBar');
    const xBar = document.getElementById('xBar');
    const metaTitleSection = document.getElementById('metaTitleSection');
    const metaDescSection = document.getElementById('metaDescSection');
    const facebookSection = document.getElementById('facebookSection');
    const instagramSection = document.getElementById('instagramSection');
    const xSection = document.getElementById('xSection');
    const loader = document.getElementById('loader');

    let currentContentType = 'general'; // Default content type
    const readingSpeed = 200; // words per minute

    // Event Listeners
    textInput.addEventListener('input', updateStats);
    document.querySelectorAll('.content-type-btn').forEach(btn => {
        btn.addEventListener('click', (e) => setContentType(e.target.getAttribute('data-type')));
    });
    document.querySelector('#analyzeUrlBtn')?.addEventListener('click', fetchUrlContent);
    document.querySelector('#copyTextBtn')?.addEventListener('click', copyText);
    document.querySelector('#clearTextBtn')?.addEventListener('click', clearText);
    document.querySelector('#upperCaseBtn')?.addEventListener('click', convertToUpper);
    document.querySelector('#lowerCaseBtn')?.addEventListener('click', convertToLower);
    document.querySelector('#capitalizeBtn')?.addEventListener('click', capitalizeText);

    function setContentType(type) {
        currentContentType = type;
        document.querySelectorAll('.content-type-btn').forEach(btn => {
            btn.classList.remove('bg-blue-600', 'text-white');
            btn.classList.add('bg-gray-200', 'text-gray-900');
        });
        document.querySelector(`[data-type="${type}"]`).classList.remove('bg-gray-200', 'text-gray-900');
        document.querySelector(`[data-type="${type}"]`).classList.add('bg-blue-600', 'text-white');
        updateStats();
    }

    function updateStats() {
        let text = textInput.value;
        const characters = text.length;
        const words = text.match(/\b\w+\b/g)?.length || 0;
        const sentences = text.split(/[.!?]+/).filter(s => s.trim().length > 0).length;
        const readingTimeSeconds = Math.ceil((words / readingSpeed) * 60);

        charCount.textContent = characters;
        wordCount.textContent = words;
        sentenceCount.textContent = sentences;
        readingTime.textContent = readingTimeSeconds + ' sec';

        metaTitleSection.classList.add('hidden');
        metaDescSection.classList.add('hidden');
        facebookSection.classList.add('hidden');
        instagramSection.classList.add('hidden');
        xSection.classList.add('hidden');

        switch (currentContentType) {
            case 'metaTitle':
                metaTitleSection.classList.remove('hidden');
                updateLimitBar(characters, 70, metaTitleCount, metaTitleBar, 'bg-blue-600');
                break;
            case 'metaDescription':
                metaDescSection.classList.remove('hidden');
                updateLimitBar(characters, 160, metaDescCount, metaDescBar, 'bg-indigo-600');
                break;
            case 'facebook':
                facebookSection.classList.remove('hidden');
                updateLimitBar(characters, 80, facebookCount, facebookBar, 'bg-blue-800');
                break;
            case 'instagram':
                instagramSection.classList.remove('hidden');
                updateLimitBar(characters, 150, instagramCount, instagramBar, 'bg-pink-600');
                break;
            case 'x':
                xSection.classList.remove('hidden');
                updateLimitBar(characters, 280, xCount, xBar, 'bg-gray-900');
                break;
        }
    }

    function updateLimitBar(chars, limit, countElement, barElement, defaultColor) {
        const percentage = Math.min((chars / limit) * 100, 100);
        countElement.textContent = `${chars}/${limit}`;
        barElement.style.width = `${percentage}%`;
        barElement.classList.remove('bg-red-600', 'bg-blue-600', 'bg-indigo-600', 'bg-blue-800', 'bg-pink-600', 'bg-gray-900');
        barElement.classList.add(chars > limit ? 'bg-red-600' : defaultColor);
    }

    function copyText() {
        textInput.select();
        document.execCommand('copy');
        alert('Text copied to clipboard!');
    }

    function clearText() {
        textInput.value = '';
        updateStats();
    }

    function convertToUpper() {
        textInput.value = textInput.value.toUpperCase();
        updateStats();
    }

    function convertToLower() {
        textInput.value = textInput.value.toLowerCase();
        updateStats();
    }

    function capitalizeText() {
        textInput.value = textInput.value.replace(/\b\w/g, c => c.toUpperCase());
        updateStats();
    }

    async function fetchUrlContent() {
        let url = urlInput.value.trim();
        if (!url) return alert('Please enter a URL');

        if (!url.match(/^https?:\/\//)) {
            url = 'https://' + url;
        }

        loader.classList.remove('hidden');

        try {
            const proxyUrl = `https://api.allorigins.win/get?url=${encodeURIComponent(url)}`;
            const response = await fetch(proxyUrl);

            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const data = await response.json();
            const html = data.contents;
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');

            doc.querySelectorAll('header, footer, script, style, nav').forEach(el => el.remove());
            const mainContent = doc.querySelector('main') || doc.querySelector('body');
            const textContent = mainContent?.textContent.trim().replace(/\s+/g, ' ') || '';

            textInput.value = textContent;
            updateStats();
        } catch (error) {
            console.error('Fetch error:', error);
            alert('Error fetching URL content: ' + error.message);
        } finally {
            loader.classList.add('hidden');
        }
    }

    // Set "General Text" as active by default on page load
    setContentType('general'); // This triggers the styling and stats update
});