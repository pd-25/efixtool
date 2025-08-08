document.addEventListener('DOMContentLoaded', () => {
    const defaultAccess = document.getElementById('default-access');
    const crawlDelay = document.getElementById('crawl-delay');
    const sitemap = document.getElementById('sitemap');
    const restrictedDirsContainer = document.getElementById('restricted-dirs');
    const addDirBtn = document.getElementById('add-dir');
    const robotsOutput = document.getElementById('robots-output');
    const copyBtn = document.getElementById('copy-btn');

    const generateRobotsTxt = () => {
        let output = 'User-agent: *\n';

        if (defaultAccess.value === 'disallow') {
            output += 'Disallow: /\n';
        } else {
            output += 'Disallow:\n';
        }

        if (crawlDelay.value) {
            output += `Crawl-delay: ${crawlDelay.value}\n`;
        }

        const restrictedDirs = restrictedDirsContainer.querySelectorAll('input[type="text"]');
        restrictedDirs.forEach(dir => {
            if (dir.value) {
                output += `Disallow: ${dir.value}\n`;
            }
        });

        if (sitemap.value) {
            output += `Sitemap: ${sitemap.value}\n`;
        }

        robotsOutput.value = output;
    };

    const addDirectoryInput = () => {
        const newDir = document.createElement('div');
        newDir.className = 'flex items-center gap-2';
        newDir.innerHTML = `
            <input type="text" class="block w-full p-2 border border-gray-300 rounded-md shadow-sm" placeholder="/directory/">
            <button class="text-red-500 hover:text-red-700 remove-dir">&times;</button>
        `;
        restrictedDirsContainer.appendChild(newDir);
        newDir.querySelector('.remove-dir').addEventListener('click', () => {
            newDir.remove();
            generateRobotsTxt();
        });
        newDir.querySelector('input[type="text"]').addEventListener('input', generateRobotsTxt);
    };

    defaultAccess.addEventListener('change', generateRobotsTxt);
    crawlDelay.addEventListener('input', generateRobotsTxt);
    sitemap.addEventListener('input', generateRobotsTxt);
    addDirBtn.addEventListener('click', addDirectoryInput);
    restrictedDirsContainer.querySelectorAll('input[type="text"]').forEach(input => {
        input.addEventListener('input', generateRobotsTxt);
    });
    restrictedDirsContainer.querySelectorAll('.remove-dir').forEach(button => {
        button.addEventListener('click', (e) => {
            e.target.parentElement.remove();
            generateRobotsTxt();
        });
    });

    copyBtn.addEventListener('click', () => {
        robotsOutput.select();
        document.execCommand('copy');
        alert('Copied to clipboard!');
    });

    generateRobotsTxt();
});
