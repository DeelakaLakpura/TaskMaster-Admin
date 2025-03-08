<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Gallery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .upload-container {
            transition: transform 0.3s ease-in-out, border-color 0.3s ease-in-out;
        }
        .upload-container:hover {
            transform: scale(1.05);
        }
        .image-preview {
            transition: transform 0.3s ease-in-out;
        }
        .image-preview:hover {
            transform: scale(1.1);
        }
        .drop-zone {
            border: 2px dashed #888;
            padding: 16px;
            text-align: center;
            cursor: pointer;
            background-color: #1a202c;
        }
    </style>
</head>
<body class="bg-gray-900 text-white min-h-screen">
    <!-- Main Container -->
    <div class="container mx-auto px-4 py-8">
        <!-- Upload Section -->
        <div class="max-w-full mx-auto mb-12">
            <div class="upload-container drop-zone" id="drop-zone">
                <input type="file" id="file-upload" class="hidden" accept="image/*" multiple>
                <label for="file-upload" class="cursor-pointer">
                    <div class="flex flex-col items-center space-y-4">
                        <div class="w-20 h-20 bg-gray-800 rounded-full flex items-center justify-center">
                            <i class="fas fa-cloud-upload-alt text-4xl text-blue-500"></i>
                        </div>
                        <div class="space-y-2">
                            <h2 class="text-2xl font-bold text-white">Drag & Drop or Click to Upload</h2>
                            <p class="text-gray-400">PNG, JPG, JPEG (Max 5MB)</p>
                        </div>
                    </div>
                </label>
            </div>
        </div>

        <!-- Selected Images Preview Section -->
        <div id="image-preview-section" class="mb-8 hidden">
            <h3 class="text-2xl font-bold text-white mb-4">Selected Images</h3>
            <div id="selected-images" class="flex flex-wrap gap-4">
                <!-- Image previews will be inserted here dynamically -->
            </div>
            <button id="submit-btn" class="mt-6 px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600">Submit</button>
        </div>

        <!-- Uploaded Files Table -->
        <div class="max-w-full mx-auto">
            <h3 class="text-2xl text-primary font-bold mb-6">Uploaded Images</h3>
            <div class="overflow-x-auto rounded-lg border border-gray-700">
                <table class="w-full">
                    <thead class="bg-gray-800">
                        <tr class="text-white">
                            <th class="px-6 py-4 text-left text-sm font-semibold">Preview</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Name</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Size</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Type</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700 bg-gray-900" id="file-list">
                        <!-- Dynamic content will be inserted here -->
                        <tr class="text-gray-300">
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500" id="empty-state">
                                No files uploaded yet
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  
    <script src="./assets/js/banner.js"></script>
</body>
</html>
