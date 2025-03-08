// Initialize File Upload Functionality
function initializeFileUploadFunctionality() {
    const fileInput = document.getElementById('file-upload');
    const imagePreviewSection = document.getElementById('image-preview-section');
    const selectedImagesContainer = document.getElementById('selected-images');
    const submitBtn = document.getElementById('submit-btn');
    const fileList = document.getElementById('file-list');
    const emptyState = document.getElementById('empty-state');
    const dropZone = document.getElementById('drop-zone');

    fileInput.addEventListener('change', handleFileSelection);

    // Handle file selection
    function handleFileSelection(event) {
        const files = event.target.files;
        if (files.length > 0) {
            imagePreviewSection.classList.remove('hidden');
            selectedImagesContainer.innerHTML = ''; // Clear previous previews

            // Loop through selected files
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const image = document.createElement('img');
                    image.src = e.target.result;
                    image.classList.add('w-32', 'h-32', 'object-cover', 'rounded-lg', 'image-preview');

                    // Create a container for the image
                    const div = document.createElement('div');
                    div.classList.add('relative', 'group');
                    div.appendChild(image);

                    // Create and add a remove button
                    const removeIcon = document.createElement('i');
                    removeIcon.classList.add('fas', 'fa-times', 'text-white', 'absolute', 'top-0', 'right-0', 'm-2', 'opacity-0', 'group-hover:opacity-100');
                    removeIcon.addEventListener('click', () => {
                        div.remove();
                        if (selectedImagesContainer.children.length === 0) {
                            imagePreviewSection.classList.add('hidden');
                        }
                    });
                    div.appendChild(removeIcon);

                    // Add the image container to the section
                    selectedImagesContainer.appendChild(div);
                };
                reader.readAsDataURL(file);
            });

            submitBtn.classList.remove('hidden');
        } else {
            imagePreviewSection.classList.add('hidden');
            submitBtn.classList.add('hidden');
        }
    }

    // Handle dragover event (prevent default)
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('bg-gray-700');
    });

    // Handle dragleave event (remove custom style)
    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('bg-gray-700');
    });

    // Handle drop event
    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('bg-gray-700');
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files; // Set the file input's files to the dropped files
            handleFileSelection({ target: fileInput });
        }
    });

    // Optional: Display files in the uploaded table
    fileInput.addEventListener('change', () => {
        const files = fileInput.files;
        fileList.innerHTML = ''; // Clear previous table content
        if (files.length === 0) {
            fileList.innerHTML = '<tr class="text-gray-300"><td colspan="5" class="px-6 py-8 text-center text-gray-500">No files uploaded yet</td></tr>';
        } else {
            Array.from(files).forEach(file => {
                const row = document.createElement('tr');
                row.classList.add('text-gray-300');
                
                row.innerHTML = `
                    <td class="px-6 py-4">
                        <img src="${URL.createObjectURL(file)}" alt="${file.name}" class="w-16 h-16 object-cover rounded-lg">
                    </td>
                    <td class="px-6 py-4">${file.name}</td>
                    <td class="px-6 py-4">${(file.size / 1024).toFixed(2)} KB</td>
                    <td class="px-6 py-4">${file.type}</td>
                    <td class="px-6 py-4">
                        <button class="text-red-500 hover:text-red-700" onclick="removeFile(this)">Delete</button>
                    </td>
                `;
                fileList.appendChild(row);
            });
        }
    });
}

// Function to remove file from table
function removeFile(button) {
    const row = button.closest('tr');
    row.remove();
    if (fileList.children.length === 1) {
        emptyState.style.display = 'table-row';
    }
}
