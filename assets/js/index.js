
tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: '#6366f1',
                secondary: '#818cf8',
                dark: '#0f172a',
                light: '#f8fafc'
            }
        }
    }
}

  // Toggle Sidebar
  document.getElementById('toggleSidebar').addEventListener('click', () => {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('active');
});
// Toggle Dropdown
document.querySelectorAll('.dropdown-btn').forEach(button => {
    button.addEventListener('click', () => {
        const dropdown = button.nextElementSibling;
        dropdown.classList.toggle('hidden');
    });
});

