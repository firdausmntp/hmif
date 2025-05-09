document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    const menuToggle = document.getElementById('menu-toggle');
    const profileDropdownToggle = document.getElementById('profile-dropdown-toggle');
    const dropdownMenu = document.getElementById('dropdown-menu');
    const profileModal = document.getElementById('profileModal');
    const profileModalOverlay = document.getElementById('profileModalOverlay');
    const closeProfileModal = document.getElementById('closeProfileModal');
    const tabInfo = document.getElementById('tab-info');
    const tabPassword = document.getElementById('tab-password');
    const contentInfo = document.getElementById('content-info');
    const contentPassword = document.getElementById('content-password');
    const passwordForm = document.getElementById('passwordForm');
    const savePasswordBtn = document.getElementById('savePasswordBtn');

    // Notifikasi elemen
    const successNotification = document.getElementById('success-notification');
    const errorNotification = document.getElementById('error-notification');
    const successMessage = document.getElementById('success-message');
    const errorMessage = document.getElementById('error-message');

    // Spinner elements jika ada
    const spinnerEl = savePasswordBtn ? savePasswordBtn.querySelector('.spinner') : null;
    const btnTextEl = savePasswordBtn ? savePasswordBtn.querySelector('.flex') : null;

    let sidebarCollapsed = false;

    const toggleSidebar = () => {
        if (window.innerWidth < 768) {
            sidebar.classList.toggle('sidebar-open');
        } else {
            sidebar.classList.toggle('sidebar-collapsed', !sidebarCollapsed);
            mainContent.classList.toggle('main-content-expanded', !sidebarCollapsed);
            sidebarCollapsed = !sidebarCollapsed;
        }
    };

    const toggleDropdown = (e) => {
        e.stopPropagation();
        dropdownMenu.classList.toggle('show');
    };

    const closeDropdown = (e) => {
        if (!profileDropdownToggle.contains(e.target)) {
            dropdownMenu.classList.remove('show');
        }
    };

    const openProfileModal = () => {
        profileModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    };

    const closeModal = () => {
        profileModal.classList.add('hidden');
        document.body.style.overflow = '';

        // Sembunyikan notifikasi saat modal ditutup
        if (successNotification) successNotification.classList.add('hidden');
        if (errorNotification) errorNotification.classList.add('hidden');
    };

    const switchTab = (showInfo) => {
        // Reset notifikasi saat berganti tab
        if (successNotification) successNotification.classList.add('hidden');
        if (errorNotification) errorNotification.classList.add('hidden');

        // Update tab appearance
        tabInfo.classList.toggle('border-blue-500', showInfo);
        tabInfo.classList.toggle('text-blue-600', showInfo);
        tabInfo.classList.toggle('border-transparent', !showInfo);
        tabInfo.classList.toggle('text-gray-500', !showInfo);
        tabPassword.classList.toggle('border-blue-500', !showInfo);
        tabPassword.classList.toggle('text-blue-600', !showInfo);
        tabPassword.classList.toggle('border-transparent', showInfo);
        tabPassword.classList.toggle('text-gray-500', showInfo);
        contentInfo.classList.toggle('hidden', !showInfo);
        contentPassword.classList.toggle('hidden', showInfo);

        // Toggle save button visibility based on active tab
        if (savePasswordBtn) {
            savePasswordBtn.style.display = showInfo ? 'none' : 'inline-flex';
        }
    };

    // Fungsi untuk menampilkan notifikasi sukses
    const showSuccessNotification = (message) => {
        if (!successNotification || !successMessage) return;

        successMessage.textContent = message;
        successNotification.classList.remove('hidden');

        // Auto hide after 5 seconds
        setTimeout(() => {
            successNotification.classList.add('hidden');
        }, 5000);
    };

    // Fungsi untuk menampilkan notifikasi error
    const showErrorNotification = (message) => {
        if (!errorNotification || !errorMessage) return;

        errorMessage.textContent = message;
        errorNotification.classList.remove('hidden');

        // Auto hide after 5 seconds
        setTimeout(() => {
            errorNotification.classList.add('hidden');
        }, 5000);
    };

    // Fungsi untuk menutup semua notifikasi
    const closeNotifications = () => {
        if (successNotification) successNotification.classList.add('hidden');
        if (errorNotification) errorNotification.classList.add('hidden');
    };

    // Fungsi untuk validasi form secara client-side
    const validatePasswordForm = (e) => {
        const password = document.getElementById('password').value;
        const passwordConfirmation = document.getElementById('password_confirmation').value;

        if (password.length < 8) {
            e.preventDefault();

            // Gunakan notifikasi jika tersedia, jika tidak gunakan alert
            if (errorNotification && errorMessage) {
                showErrorNotification('Password baru harus minimal 8 karakter.');
            } else {
                alert('Password baru harus minimal 8 karakter.');
            }
            return;
        }

        if (password !== passwordConfirmation) {
            e.preventDefault();

            // Gunakan notifikasi jika tersedia, jika tidak gunakan alert
            if (errorNotification && errorMessage) {
                showErrorNotification('Konfirmasi password tidak sama dengan password baru.');
            } else {
                alert('Konfirmasi password tidak sama dengan password baru.');
            }
            return;
        }
    };

    // Fungsi untuk menangani submit form dengan AJAX
    const submitPasswordForm = async (e) => {
        if (!passwordForm) return;

        e.preventDefault();

        // Client-side validation
        const password = document.getElementById('password').value;
        const passwordConfirmation = document.getElementById('password_confirmation').value;

        if (password.length < 8) {
            showErrorNotification('Password baru harus minimal 8 karakter.');
            return;
        }

        if (password !== passwordConfirmation) {
            showErrorNotification('Konfirmasi password tidak sama dengan password baru.');
            return;
        }

        // Show loading state if spinner elements exist
        if (savePasswordBtn && spinnerEl && btnTextEl) {
            savePasswordBtn.disabled = true;
            spinnerEl.classList.remove('hidden');
            btnTextEl.classList.add('hidden');
        }

        try {
            const formData = new FormData(passwordForm);
            const response = await fetch(passwordForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
                credentials: 'same-origin'
            });

            const result = await response.json();

            // Hide loading state
            if (savePasswordBtn && spinnerEl && btnTextEl) {
                savePasswordBtn.disabled = false;
                spinnerEl.classList.add('hidden');
                btnTextEl.classList.remove('hidden');
            }

            if (response.ok) {
                // Reset form
                passwordForm.reset();
                showSuccessNotification(result.message || 'Password berhasil diubah');
            } else {
                showErrorNotification(result.message || 'Terjadi kesalahan. Silakan coba lagi.');
            }
        } catch (error) {
            // Hide loading state
            if (savePasswordBtn && spinnerEl && btnTextEl) {
                savePasswordBtn.disabled = false;
                spinnerEl.classList.add('hidden');
                btnTextEl.classList.remove('hidden');
            }

            showErrorNotification('Terjadi kesalahan. Silakan coba lagi.');
            console.error('Error:', error);
        }
    };

    // Check for flash messages on page load
    const checkFlashMessages = () => {
        // Ambil flash messages dari session jika tersedia melalui data attributes
        const successFlash = document.body.getAttribute('data-success-message');
        const errorFlash = document.body.getAttribute('data-error-message');

        if (successFlash) {
            showSuccessNotification(successFlash);
            openProfileModal();
        }

        if (errorFlash) {
            showErrorNotification(errorFlash);
            if (tabPassword && contentPassword) {
                switchTab(false); // Show password tab
            }
            openProfileModal();
        }
    };

    // Setup event listeners
    menuToggle?.addEventListener('click', toggleSidebar);
    profileDropdownToggle?.addEventListener('click', toggleDropdown);
    document.addEventListener('click', closeDropdown);
    document.querySelector('.dropdown-item:first-child')?.addEventListener('click', (e) => {
        e.preventDefault();
        openProfileModal();
    });
    closeProfileModal?.addEventListener('click', closeModal);
    profileModalOverlay?.addEventListener('click', closeModal);
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !profileModal.classList.contains('hidden')) {
            closeModal();
        }
    });
    tabInfo?.addEventListener('click', () => switchTab(true));
    tabPassword?.addEventListener('click', () => switchTab(false));

    // Setup form handling - either use AJAX if savePasswordBtn exists, or normal validation
    if (savePasswordBtn) {
        savePasswordBtn.addEventListener('click', submitPasswordForm);
    } else if (passwordForm) {
        passwordForm.addEventListener('submit', validatePasswordForm);
    }

    // Setup notification close buttons
    document.querySelectorAll('.close-notification')?.forEach(btn => {
        btn.addEventListener('click', closeNotifications);
    });

    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            document.querySelectorAll('.nav-link').forEach(item => item.classList.remove('active'));
            link.classList.add('active');
        });
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth < 768) {
            sidebar.classList.remove('sidebar-collapsed', 'sidebar-open');
            mainContent.classList.remove('main-content-expanded');
        } else {
            sidebar.style.transform = 'translateX(0)';
            sidebar.classList.toggle('sidebar-collapsed', sidebarCollapsed);
            mainContent.classList.toggle('main-content-expanded', sidebarCollapsed);
        }
    });

    // Check for flash messages when the page loads
    checkFlashMessages();
});