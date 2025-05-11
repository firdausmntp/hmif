document.addEventListener('DOMContentLoaded', () => {
    // ============ Sidebar & Dropdown Logic ============
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    const menuToggle = document.getElementById('menu-toggle');
    const profileDropdownToggle = document.getElementById('profile-dropdown-toggle');
    const dropdownMenu = document.getElementById('dropdown-menu');

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
        dropdownMenu?.classList.toggle('show');
    };

    const closeDropdown = (e) => {
        if (profileDropdownToggle && !profileDropdownToggle.contains(e.target)) {
            dropdownMenu?.classList.remove('show');
        }
    };

    if (menuToggle) menuToggle.addEventListener('click', toggleSidebar);
    if (profileDropdownToggle) profileDropdownToggle.addEventListener('click', toggleDropdown);
    document.addEventListener('click', closeDropdown);

    window.addEventListener('resize', () => {
        if (window.innerWidth < 768) {
            sidebar?.classList.remove('sidebar-collapsed', 'sidebar-open');
            mainContent?.classList.remove('main-content-expanded');
        } else {
            sidebar.style.transform = 'translateX(0)';
            sidebar?.classList.toggle('sidebar-collapsed', sidebarCollapsed);
            mainContent?.classList.toggle('main-content-expanded', sidebarCollapsed);
        }
    });

    // ============ Profile Modal & Tabs Logic ============
    const profileModal = document.getElementById('profileModal');
    const profileModalOverlay = document.getElementById('profileModalOverlay');
    const closeProfileModal = document.getElementById('closeProfileModal');
    const tabInfo = document.getElementById('tab-info');
    const tabPassword = document.getElementById('tab-password');
    const contentInfo = document.getElementById('content-info');
    const contentPassword = document.getElementById('content-password');
    const passwordForm = document.getElementById('passwordForm');
    const savePasswordBtn = document.getElementById('savePasswordBtn');
    const successNotification = document.getElementById('success-notification');
    const errorNotification = document.getElementById('error-notification');
    const successMessage = document.getElementById('success-message');
    const errorMessage = document.getElementById('error-message');

    const spinnerEl = savePasswordBtn ? savePasswordBtn.querySelector('.spinner') : null;
    const btnTextEl = savePasswordBtn ? savePasswordBtn.querySelector('.flex') : null;

    const openProfileModal = () => {
        if (profileModal) {
            profileModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    };

    const closeModal = () => {
        if (profileModal) {
            profileModal.classList.add('hidden');
            document.body.style.overflow = '';
        }

        if (successNotification) successNotification.classList.add('hidden');
        if (errorNotification) errorNotification.classList.add('hidden');
    };

    const switchTab = (showInfo) => {
        if (successNotification) successNotification.classList.add('hidden');
        if (errorNotification) errorNotification.classList.add('hidden');

        if (tabInfo) tabInfo.classList.toggle('border-blue-500', showInfo);
        if (tabInfo) tabInfo.classList.toggle('text-blue-600', showInfo);
        if (tabInfo) tabInfo.classList.toggle('border-transparent', !showInfo);
        if (tabInfo) tabInfo.classList.toggle('text-gray-500', !showInfo);

        if (tabPassword) tabPassword.classList.toggle('border-blue-500', !showInfo);
        if (tabPassword) tabPassword.classList.toggle('text-blue-600', !showInfo);
        if (tabPassword) tabPassword.classList.toggle('border-transparent', showInfo);
        if (tabPassword) tabPassword.classList.toggle('text-gray-500', showInfo);

        if (contentInfo) contentInfo.classList.toggle('hidden', !showInfo);
        if (contentPassword) contentPassword.classList.toggle('hidden', showInfo);

        if (savePasswordBtn) {
            savePasswordBtn.style.display = showInfo ? 'none' : 'inline-flex';
        }
    };

    const showSuccessNotification = (message) => {
        if (!successNotification || !successMessage) return;
        successMessage.textContent = message;
        successNotification.classList.remove('hidden');
        setTimeout(() => successNotification.classList.add('hidden'), 5000);
    };

    const showErrorNotification = (message) => {
        if (!errorNotification || !errorMessage) return;
        errorMessage.textContent = message;
        errorNotification.classList.remove('hidden');
        setTimeout(() => errorNotification.classList.add('hidden'), 5000);
    };

    const closeNotifications = () => {
        if (successNotification) successNotification.classList.add('hidden');
        if (errorNotification) errorNotification.classList.add('hidden');
    };

    const validatePasswordForm = (e) => {
        const password = document.getElementById('password')?.value;
        const confirmation = document.getElementById('password_confirmation')?.value;

        if (password.length < 8) {
            e.preventDefault();
            showErrorNotification('Password minimal 8 karakter.');
            return;
        }

        if (password !== confirmation) {
            e.preventDefault();
            showErrorNotification('Konfirmasi password tidak cocok.');
            return;
        }
    };

    const submitPasswordForm = async (e) => {
        if (!passwordForm) return;
        e.preventDefault();

        const password = document.getElementById('password')?.value;
        const confirmation = document.getElementById('password_confirmation')?.value;

        if (password.length < 8) {
            showErrorNotification('Password minimal 8 karakter.');
            return;
        }

        if (password !== confirmation) {
            showErrorNotification('Konfirmasi password tidak cocok.');
            return;
        }

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
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                credentials: 'same-origin'
            });

            const result = await response.json();

            if (savePasswordBtn && spinnerEl && btnTextEl) {
                savePasswordBtn.disabled = false;
                spinnerEl.classList.add('hidden');
                btnTextEl.classList.remove('hidden');
            }

            if (response.ok) {
                passwordForm.reset();
                showSuccessNotification(result.message || 'Password berhasil diubah');
            } else {
                showErrorNotification(result.message || 'Gagal mengubah password.');
            }
        } catch (error) {
            if (savePasswordBtn && spinnerEl && btnTextEl) {
                savePasswordBtn.disabled = false;
                spinnerEl.classList.add('hidden');
                btnTextEl.classList.remove('hidden');
            }
            showErrorNotification('Terjadi kesalahan. Silakan coba lagi.');
            console.error('Error:', error);
        }
    };

    if (profileModal && closeProfileModal && profileModalOverlay) {
        document.querySelector('.dropdown-item:first-child')?.addEventListener('click', (e) => {
            e.preventDefault();
            openProfileModal();
        });
        closeProfileModal.addEventListener('click', closeModal);
        profileModalOverlay.addEventListener('click', closeModal);
    }

    if (tabInfo) tabInfo.addEventListener('click', () => switchTab(true));
    if (tabPassword) tabPassword.addEventListener('click', () => switchTab(false));

    if (savePasswordBtn) {
        savePasswordBtn.addEventListener('click', submitPasswordForm);
    } else if (passwordForm) {
        passwordForm.addEventListener('submit', validatePasswordForm);
    }

    document.querySelectorAll('.close-notification')?.forEach(btn => {
        btn.addEventListener('click', closeNotifications);
    });

    // ============ User Modals Logic ============
    const initUserModals = () => {
        const addUserBtn = document.querySelector('.add-user-btn');
        if (addUserBtn) {
            addUserBtn.addEventListener('click', function () {
                const modal = document.getElementById('userEditModalCreate');
                if (modal) modal.classList.remove('hidden');
            });
        }

        document.querySelectorAll('.show-user-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const userId = this.dataset.userId;
                const userName = this.dataset.userName;
                const userEmail = this.dataset.userEmail;
                const userRole = this.dataset.userRole;
                const userCreatedAt = this.dataset.userCreated;

                document.getElementById('show_user_id').textContent = userId || '-';
                document.getElementById('show_user_name').textContent = userName || '-';
                document.getElementById('show_user_email').textContent = userEmail || '-';
                document.getElementById('show_user_role').textContent = userRole || '-';
                document.getElementById('show_user_created_at').textContent = userCreatedAt || '-';

                const modal = document.getElementById('userEditModalShow');
                if (modal) modal.classList.remove('hidden');
            });
        });

        document.querySelectorAll('.edit-user-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const userId = this.dataset.userId;
                const userName = this.dataset.userName;
                const userEmail = this.dataset.userEmail;
                const userRole = this.dataset.userRole;

                document.getElementById('edit_user_id').value = userId;
                document.getElementById('edit_name').value = userName;
                document.getElementById('edit_email').value = userEmail;
                document.getElementById('edit_role').value = userRole;
                document.getElementById('editUserForm').action = `/admin/users/${userId}`;

                const modal = document.getElementById('userEditModalEdit');
                if (modal) modal.classList.remove('hidden');
            });
        });

        document.querySelectorAll('.delete-user-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const userId = this.dataset.userId;
                const userName = this.dataset.userName;

                document.getElementById('delete_user_id').value = userId;
                document.getElementById('delete_user_name').textContent = userName;
                document.getElementById('deleteUserForm').action = `/admin/users/${userId}`;

                const modal = document.getElementById('userEditModalDelete');
                if (modal) modal.classList.remove('hidden');
            });
        });
    };

    // Jalankan setelah semua DOM dimuat
    if (typeof initUserModals === 'function') initUserModals();
});