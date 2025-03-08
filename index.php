<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Sidebar UI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    
</head>

<body class="bg-dark min-h-screen flex">

    <!-- Sidebar -->
    <nav id="sidebar" class="mobile-menu fixed md:relative z-50 w-64 md:w-20 lg:w-64 h-screen bg-dark border-r border-gray-800 sidebar-transition">
        <div class="p-5 h-full flex flex-col">
            <!-- Logo -->
            <div class="flex items-center justify-between mb-8">
                <span class="text-2xl font-bold text-primary lg:block hidden">TaskMaster</span>
                <button id="toggleSidebar" class="md:hidden text-light hover:text-secondary">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
            <!-- Menu Items -->
            <ul class="space-y-2 flex-1 overflow-y-auto">
                <li>
                    <a href="#" id="homeMenu" class="flex items-center p-3 rounded-lg hover:bg-gray-800 group">
                        <i class="fas fa-home text-lg w-6 text-secondary"></i>
                        <span class="ml-3 text-light group-hover:text-secondary lg:block hidden">Home</span>
                    </a>
                </li>
                <!-- Services Dropdown -->
                <li class="relative">
                    <button class="w-full flex items-center justify-between p-3 rounded-lg hover:bg-gray-800 group dropdown-btn">
                        <div class="flex items-center">
                            <i class="fas fa-concierge-bell text-lg w-6 text-secondary"></i>
                            <span class="ml-3 text-light group-hover:text-secondary lg:block hidden">Services</span>
                        </div>
                        <i class="fas fa-chevron-down text-light text-sm lg:block hidden"></i>
                    </button>
                    <div class="dropdown-menu hidden flex-col bg-dark border border-gray-800 rounded-lg shadow-xl overflow-hidden">
                        <a href="#" id="cleaningService" class="block px-4 py-3 hover:bg-gray-800 text-light">Cleaning Service</a>
                        <a href="#" id="repairingService" class="block px-4 py-3 hover:bg-gray-800 text-light">Repairing Service</a>
                        <a href="#" id="paintingService" class="block px-4 py-3 hover:bg-gray-800 text-light">Painting Service</a>
                    </div>
                </li>
                <li>
                    <a href="#" id="messagesMenu" class="flex items-center p-3 rounded-lg hover:bg-gray-800 group">
                        <i class="fas fa-envelope text-lg w-6 text-secondary"></i>
                        <span class="ml-3 text-light group-hover:text-secondary lg:block hidden">Messages</span>
                        <span class="ml-auto bg-primary text-light px-2 rounded-full text-sm lg:block hidden">3</span>
                    </a>
                </li>

                <li>
                    <a href="#" id="bannerMenu" class="flex items-center p-3 rounded-lg hover:bg-gray-800 group">
                        <i class="fas fa-upload text-lg w-6 text-secondary"></i>
                        <span class="ml-3 text-light group-hover:text-secondary lg:block hidden">Banner</span>
                    </a>
                </li>

                <li>
                    <a href="#" id="computerMenu" class="flex items-center p-3 rounded-lg hover:bg-gray-800 group">
                        <i class="fas fa-laptop text-lg w-6 text-secondary"></i>
                        <span class="ml-3 text-light group-hover:text-secondary lg:block hidden">Computer troubleshooting</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div id="mainContentWrapper" class="flex-1 flex flex-col transition-all duration-300">
        <main id="mainContent" class="flex-1 p-6 transition-all duration-300">
            <div id="contentArea">
                <!-- Dynamic content will be inserted here -->
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function loadPage(pageUrl) {
    const contentArea = document.getElementById('contentArea');
    contentArea.innerHTML = '<div class="text-center text-white">Loading...</div>';

    fetch(pageUrl)
        .then(response => response.text())
        .then(data => {
            contentArea.innerHTML = data;

            if (pageUrl.includes('banner.php')) {
                loadBannerScript();
            }
        })
        .catch(error => {
            console.error('Error loading page:', error);
            contentArea.innerHTML = '<div class="text-center text-red-500">Error loading page.</div>';
        });
}

// Function to load banner.js dynamically and initialize the functionality
function loadBannerScript() {
    const script = document.createElement('script');
    script.src = './assets/js/banner.js'; // Ensure the path is correct
    script.defer = true;
    document.body.appendChild(script);

    script.onload = function() {
        console.log('Banner script loaded and executed.');
        initializeFileUploadFunctionality();  // Call the initialization function after script load
    };
}

            // Menu click event listeners
            document.getElementById('homeMenu').addEventListener('click', () => {
                loadPage('dashboard.php'); // Update this to match your file structure
            });

            document.getElementById('cleaningService').addEventListener('click', () => {
                loadPage('services/cleaningService.php'); // Update this to match your file structure
            });

            document.getElementById('repairingService').addEventListener('click', () => {
                loadPage('services/repairingService.php'); // Update this to match your file structure
            });

            document.getElementById('paintingService').addEventListener('click', () => {
                loadPage('services/paintingService.php'); // Update this to match your file structure
            });

            document.getElementById('messagesMenu').addEventListener('click', () => {
                loadPage('messages.php'); // Update this to match your file structure
            });

            document.getElementById('bannerMenu').addEventListener('click', () => {
                loadPage('banner.php'); // Ensure this PHP file exists in your server
            });

            // Default load the dashboard page on initial load
            loadPage('dashboard.php'); // Default page on load
        });
    </script>
 
    <script src="./assets/js/index.js"></script>
</body>

</html>
