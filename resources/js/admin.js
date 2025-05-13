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

    const initArticleModals = () => {
        const addArticleBtn = document.querySelector('.add-article-btn');
        if (addArticleBtn) {
            addArticleBtn.addEventListener('click', function () {
                const modal = document.getElementById('articleEditModalCreate');
                if (modal) modal.classList.remove('hidden');
            });
        }

        document.querySelectorAll('.show-article-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const articleId = this.dataset.articleId;
                const articleTitle = this.dataset.articleTitle;
                const articleContent = this.dataset.articleContent;
                const articleImage = this.dataset.articleImage;
                const articleCreatedAt = this.dataset.articleCreated;

                document.getElementById('show_article_id').textContent = articleId || '-';
                document.getElementById('show_article_title').textContent = articleTitle || '-';
                document.getElementById('show_article_content').textContent = articleContent || '-';
                document.getElementById('show_article_created_at').textContent = articleCreatedAt || '-';

                // Handle image display
                const imageContainer = document.getElementById('show_image_container');
                const imageElement = document.getElementById('show_article_image');

                if (articleImage) {
                    imageContainer.classList.remove('hidden');
                    imageElement.src = `/${articleImage}`; // Updated path for public directory
                } else {
                    imageContainer.classList.add('hidden');
                }

                const modal = document.getElementById('articleEditModalShow');
                if (modal) modal.classList.remove('hidden');
            });
        });

        document.querySelectorAll('.edit-article-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const articleId = this.dataset.articleId;
                const articleTitle = this.dataset.articleTitle;
                const articleContent = this.dataset.articleContent;
                const articleImage = this.dataset.articleImage;

                document.getElementById('edit_article_id').value = articleId;
                document.getElementById('edit_title').value = articleTitle;
                document.getElementById('edit_content').value = articleContent;
                document.getElementById('editArticleForm').action = `/admin/articles/${articleId}`;

                // Handle current image preview
                const currentImageContainer = document.getElementById('current_image_container');
                const currentImage = document.getElementById('current_image');
                if (articleImage) {
                    currentImageContainer.classList.remove('hidden');

                    currentImage.src = `/${articleImage}`;
                } else {
                    currentImageContainer.classList.add('hidden');
                }

                const modal = document.getElementById('articleEditModalEdit');
                if (modal) modal.classList.remove('hidden');
            });
        });

        document.querySelectorAll('.delete-article-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const articleId = this.dataset.articleId;
                const articleTitle = this.dataset.articleTitle;

                document.getElementById('delete_article_id').value = articleId;
                document.getElementById('delete_article_title').textContent = articleTitle;
                document.getElementById('deleteArticleForm').action = `/admin/articles/${articleId}`;

                const modal = document.getElementById('articleEditModalDelete');
                if (modal) modal.classList.remove('hidden');
            });
        });

        // Close modal when clicking on overlay or close button
        document.querySelectorAll('#articleEditModalCreate, #articleEditModalEdit, #articleEditModalShow, #articleEditModalDelete').forEach(modal => {
            if (modal) {
                // Close when clicking outside modal content
                modal.addEventListener('click', function (e) {
                    if (e.target === this) {
                        this.classList.add('hidden');
                    }
                });

                // Close when clicking close button
                const closeBtn = modal.querySelector('button[type="button"]');
                if (closeBtn) {
                    closeBtn.addEventListener('click', function () {
                        modal.classList.add('hidden');
                    });
                }
            }
        });
    };

    const initEventModals = () => {
        const addEventBtn = document.querySelector('.add-event-btn');
        if (addEventBtn) {
            addEventBtn.addEventListener('click', function () {
                const modal = document.getElementById('eventEditModalCreate');
                if (modal) modal.classList.remove('hidden');
            });
        }

        document.querySelectorAll('.show-event-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const eventId = this.dataset.eventId;
                const eventTitle = this.dataset.eventTitle;
                const eventDetail = this.dataset.eventDetail;
                const eventCategory = this.dataset.eventCategory;
                const eventDate = this.dataset.eventDate;
                const eventStartTime = this.dataset.eventStartTime;
                const eventEndTime = this.dataset.eventEndTime;
                const eventLocation = this.dataset.eventLocation;
                const eventStatus = this.dataset.eventStatus;
                const eventImage = this.dataset.eventImage;
                const eventCreatedAt = this.dataset.eventCreated;

                document.getElementById('show_event_id').textContent = eventId || '-';
                document.getElementById('show_event_title').textContent = eventTitle || '-';
                document.getElementById('show_event_detail').textContent = eventDetail || '-';
                document.getElementById('show_event_category').textContent = eventCategory || '-';

                // Format and show date
                if (eventDate) {
                    const formattedDate = new Date(eventDate).toLocaleDateString('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                    document.getElementById('show_event_date').textContent = formattedDate;
                } else {
                    document.getElementById('show_event_date').textContent = 'Tidak ditentukan';
                }

                // Format and show time
                const timeElement = document.getElementById('show_event_time');
                if (eventStartTime || eventEndTime) {
                    let timeText = '';
                    if (eventStartTime) {
                        timeText += formatTime(eventStartTime);
                    }
                    if (eventStartTime && eventEndTime) {
                        timeText += ' - ';
                    }
                    if (eventEndTime) {
                        timeText += formatTime(eventEndTime);
                    }
                    timeElement.textContent = timeText;
                    timeElement.classList.remove('hidden');
                } else {
                    timeElement.classList.add('hidden');
                }

                document.getElementById('show_event_location').textContent = eventLocation || 'Tidak ditentukan';
                document.getElementById('show_event_created_at').textContent = eventCreatedAt || '-';

                // Set status with appropriate styling
                const statusElement = document.getElementById('show_event_status');
                let statusClass = '';
                let statusText = '';

                switch (eventStatus) {
                    case 'upcoming':
                        statusClass = 'bg-blue-100 text-blue-800';
                        statusText = 'Akan Datang';
                        break;
                    case 'ongoing':
                        statusClass = 'bg-green-100 text-green-800';
                        statusText = 'Sedang Berlangsung';
                        break;
                    case 'completed':
                        statusClass = 'bg-gray-100 text-gray-800';
                        statusText = 'Selesai';
                        break;
                    case 'canceled':
                        statusClass = 'bg-red-100 text-red-800';
                        statusText = 'Dibatalkan';
                        break;
                    default:
                        statusClass = 'bg-blue-100 text-blue-800';
                        statusText = eventStatus || 'Tidak Diketahui';
                }

                statusElement.innerHTML = `<span class="px-2 py-1 text-xs leading-5 font-semibold rounded-full ${statusClass}">${statusText}</span>`;

                // Handle image display
                const imageContainer = document.getElementById('show_image_container');
                const imageElement = document.getElementById('show_event_image');

                if (eventImage) {
                    imageContainer.classList.remove('hidden');
                    imageElement.src = `/${eventImage}`; // Path for public directory
                } else {
                    imageContainer.classList.add('hidden');
                }

                const modal = document.getElementById('eventEditModalShow');
                if (modal) modal.classList.remove('hidden');
            });
        });

        document.querySelectorAll('.edit-event-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const eventId = this.dataset.eventId;
                const eventTitle = this.dataset.eventTitle;
                const eventDetail = this.dataset.eventDetail;
                const eventCategory = this.dataset.eventCategory;
                const eventDate = this.dataset.eventDate;
                const eventStartTime = this.dataset.eventStartTime;
                const eventEndTime = this.dataset.eventEndTime;
                const eventLocation = this.dataset.eventLocation;
                const eventStatus = this.dataset.eventStatus;
                const eventImage = this.dataset.eventImage;

                document.getElementById('edit_event_id').value = eventId;
                document.getElementById('edit_title').value = eventTitle;
                document.getElementById('edit_detail').value = eventDetail;
                document.getElementById('edit_category').value = eventCategory;

                if (eventDate) {
                    document.getElementById('edit_event_date').value = eventDate;
                }

                if (eventStartTime) {
                    document.getElementById('edit_start_time').value = eventStartTime;
                }

                if (eventEndTime) {
                    document.getElementById('edit_end_time').value = eventEndTime;
                }

                document.getElementById('edit_location').value = eventLocation || '';

                // Set status dropdown
                const statusSelect = document.getElementById('edit_status');
                if (statusSelect) {
                    for (let i = 0; i < statusSelect.options.length; i++) {
                        if (statusSelect.options[i].value === eventStatus) {
                            statusSelect.selectedIndex = i;
                            break;
                        }
                    }
                }

                document.getElementById('editEventForm').action = `/admin/events/${eventId}`;

                // Handle current image preview
                const currentImageContainer = document.getElementById('current_image_container');
                const currentImage = document.getElementById('current_image');

                if (eventImage) {
                    currentImageContainer.classList.remove('hidden');
                    currentImage.src = `/${eventImage}`;
                } else {
                    currentImageContainer.classList.add('hidden');
                }

                const modal = document.getElementById('eventEditModalEdit');
                if (modal) modal.classList.remove('hidden');
            });
        });

        document.querySelectorAll('.delete-event-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const eventId = this.dataset.eventId;
                const eventTitle = this.dataset.eventTitle;

                document.getElementById('delete_event_id').value = eventId;
                document.getElementById('delete_event_title').textContent = eventTitle;
                document.getElementById('deleteEventForm').action = `/admin/events/${eventId}`;

                const modal = document.getElementById('eventEditModalDelete');
                if (modal) modal.classList.remove('hidden');
            });
        });

        // Close modal when clicking on overlay or close button
        document.querySelectorAll('#eventEditModalCreate, #eventEditModalEdit, #eventEditModalShow, #eventEditModalDelete').forEach(modal => {
            if (modal) {
                // Close when clicking outside modal content
                modal.addEventListener('click', function (e) {
                    if (e.target === this) {
                        this.classList.add('hidden');
                    }
                });

                // Close when clicking close button
                const closeBtn = modal.querySelector('button[type="button"]');
                if (closeBtn) {
                    closeBtn.addEventListener('click', function () {
                        modal.classList.add('hidden');
                    });
                }
            }
        });

        // Format time helper function
        function formatTime(timeString) {
            if (!timeString) return '';

            try {
                // Jika format waktu sudah 'HH:MM'
                const [hours, minutes] = timeString.split(':');
                const date = new Date();
                date.setHours(parseInt(hours, 10));
                date.setMinutes(parseInt(minutes, 10));

                return date.toLocaleTimeString('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false // Gunakan format 24 jam
                });
            } catch (e) {
                return timeString; // Jika parsing gagal, kembalikan string asli
            }
        }
    };


    // Jalankan setelah semua DOM dimuat
    if (typeof initUserModals === 'function') initUserModals();
    if (typeof initArticleModals === 'function') initArticleModals();
    if (typeof initEventModals === 'function') initEventModals();
});