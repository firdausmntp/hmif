import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;


const initNavigationAndModal = () => {
    // Mobile menu functionality
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            const isExpanded = mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('flex', !isExpanded);
            mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
        });
    }

    // About dropdown functionality (desktop)
    const aboutButton = document.getElementById('about-menu-button');
    const aboutDropdownMenu = document.getElementById('about-dropdown-menu');

    if (aboutButton && aboutDropdownMenu) {
        aboutButton.addEventListener('click', () => {
            const isExpanded = aboutDropdownMenu.classList.contains('hidden');
            aboutDropdownMenu.classList.toggle('hidden', !isExpanded);

            // Add animation classes
            if (isExpanded) {
                aboutDropdownMenu.classList.add('transition', 'ease-out', 'duration-100', 'transform', 'opacity-100', 'scale-100');
                aboutDropdownMenu.classList.remove('opacity-0', 'scale-95');
            } else {
                aboutDropdownMenu.classList.add('transition', 'ease-in', 'duration-75', 'transform', 'opacity-0', 'scale-95');
                aboutDropdownMenu.classList.remove('opacity-100', 'scale-100');
            }

            aboutButton.setAttribute('aria-expanded', isExpanded);
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!aboutButton.contains(event.target) && !aboutDropdownMenu.contains(event.target)) {
                aboutDropdownMenu.classList.add('hidden');
                aboutButton.setAttribute('aria-expanded', 'false');
            }
        });
    }

    // Mobile About dropdown functionality
    const mobileAboutButton = document.getElementById('mobile-about-button');
    const mobileAboutDropdownMenu = document.getElementById('mobile-about-dropdown-menu');

    if (mobileAboutButton && mobileAboutDropdownMenu) {
        mobileAboutButton.addEventListener('click', () => {
            mobileAboutDropdownMenu.classList.toggle('hidden');
        });
    }

    // Login modal functionality
    const loginModal = document.getElementById('loginModal');
    const loginButtons = document.querySelectorAll('[data-bs-target="#loginModal"]');
    const closeLoginModal = document.getElementById('closeLoginModal');
    const togglePasswordButton = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    if (loginModal) {
        // Open modal when login buttons are clicked
        loginButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                loginModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; // Prevent scrolling
            });
        });

        // Close modal when close button is clicked
        if (closeLoginModal) {
            closeLoginModal.addEventListener('click', () => {
                loginModal.classList.add('hidden');
                document.body.style.overflow = ''; // Restore scrolling
            });
        }

        // Close modal when clicking outside
        loginModal.addEventListener('click', (e) => {
            if (e.target === loginModal) {
                loginModal.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });

        // Toggle password visibility
        if (togglePasswordButton && passwordInput) {
            togglePasswordButton.addEventListener('click', () => {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                const icon = togglePasswordButton.querySelector('i');
                if (type === 'password') {
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                } else {
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                }
            });
        }

        // Check if we should show the login modal based on a data attribute
        const shouldShowLoginModal = loginModal.getAttribute('data-show-modal') === 'true';
        if (shouldShowLoginModal) {
            loginModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }
};

function initAspirasiModals() {
    document.querySelectorAll('.aspirasi-show-modal').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const modalId = this.getAttribute('data-modal');
            const modal = document.getElementById(modalId);

            if (modal) {
                const aspirasiId = this.getAttribute('data-id');
                const url = `/aspirasi/${aspirasiId}/detail`;

                // For immediate display while waiting for AJAX
                const name = this.getAttribute('data-name');
                const aspirasi = this.getAttribute('data-aspirasi');
                const status = this.getAttribute('data-status');
                const date = this.getAttribute('data-date');

                document.getElementById('aspirasiName').textContent = name;
                document.getElementById('aspirasiContent').textContent = aspirasi;
                document.getElementById('aspirasiStatus').textContent = status.charAt(0).toUpperCase() + status.slice(1);
                document.getElementById('aspirasiDate').textContent = date;

                // Show modal immediately
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';

                // Then fetch full details if needed
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        // Update with complete data from server
                        document.getElementById('aspirasiName').textContent = data.is_anonymous ? 'Anonim' : data.name;
                        document.getElementById('aspirasiContent').textContent = data.aspirasi;
                        document.getElementById('aspirasiStatus').textContent = data.status.charAt(0).toUpperCase() + data.status.slice(1);
                        document.getElementById('aspirasiDate').textContent = new Date(data.created_at).toLocaleDateString();
                    })
                    .catch(error => {
                        console.error("Error fetching aspirasi details:", error);
                    });
            }
        });
    });

    // Close modal when X button is clicked
    const closeButton = document.getElementById('closeAspirasiModal');
    if (closeButton) {
        closeButton.addEventListener('click', () => {
            const modal = document.getElementById('aspirasiModal');
            if (modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });
    }

    // Close modal when clicking outside of it
    window.addEventListener('click', (e) => {
        const modal = document.getElementById('aspirasiModal');
        if (modal && e.target === modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    });
}


const initAspirasiField = () => {
    Alpine.data('aspirasiField', () => ({
        charCount: 0,
        previewMode: false,
        formattedContent: '',

        // Format text function
        formatText(format) {
            const textarea = document.getElementById('aspirasi-area');
            if (!textarea) return;

            const selectionStart = textarea.selectionStart;
            const selectionEnd = textarea.selectionEnd;
            const selectedText = textarea.value.substring(selectionStart, selectionEnd);

            let formattedText = '';
            let cursorPosition = 0;

            switch (format) {
                case 'bold':
                    formattedText = `**${selectedText}**`;
                    cursorPosition = selectionStart + 2;
                    break;
                case 'italic':
                    formattedText = `*${selectedText}*`;
                    cursorPosition = selectionStart + 1;
                    break;
                case 'code':
                    formattedText = `\`${selectedText}\``;
                    cursorPosition = selectionStart + 1;
                    break;
                case 'list':
                    // Handle lists - add a dash at the beginning of each line
                    if (selectedText) {
                        // Format multiple lines
                        formattedText = selectedText.split('\n')
                            .map(line => line.trim() ? `- ${line}` : line)
                            .join('\n');
                    } else {
                        formattedText = '- ';
                    }
                    cursorPosition = selectionStart + 2;
                    break;
            }

            // Replace the selected text with the formatted text
            const textBefore = textarea.value.substring(0, selectionStart);
            const textAfter = textarea.value.substring(selectionEnd);

            textarea.value = textBefore + formattedText + textAfter;
            this.charCount = textarea.value.length;

            // Set the cursor position
            if (selectedText.length > 0) {
                // If text was selected, place cursor after the formatted text
                textarea.selectionStart = selectionStart + formattedText.length;
                textarea.selectionEnd = selectionStart + formattedText.length;
            } else {
                // If no text was selected, place cursor inside the formatting tags
                textarea.selectionStart = cursorPosition;
                textarea.selectionEnd = cursorPosition;
            }

            // Focus back on the textarea
            textarea.focus();

            // Trigger auto-resize
            this.adjustTextareaHeight();

            // Update formatted content for preview
            this.updateFormattedContent();
        },

        // Update formatted content for preview
        updateFormattedContent() {
            const textarea = document.getElementById('aspirasi-area');
            if (!textarea) return;

            let content = textarea.value;

            // Apply formatting
            // Bold: **text** -> <strong>text</strong>
            content = content.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');

            // Italic: *text* -> <em>text</em>
            content = content.replace(/\*(.*?)\*/g, '<em>$1</em>');

            // Code: `text` -> <code>text</code>
            content = content.replace(/\`(.*?)\`/g, '<code class="bg-gray-100 px-1 py-0.5 rounded text-sm">$1</code>');

            // Lists: - text -> <li>text</li>
            content = content.replace(/^- (.*?)$/gm, '<li>$1</li>')
                .replace(/<li>/g, '<ul class="ml-5 list-disc"><li>')
                .replace(/<\/li>$/gm, '</li></ul>');

            // Preserve line breaks
            content = content.replace(/\n/g, '<br>');

            this.formattedContent = content;
        },

        // Toggle preview mode
        togglePreview() {
            this.previewMode = !this.previewMode;
            if (this.previewMode) {
                this.updateFormattedContent();
            }
        },

        // Adjust textarea height
        adjustTextareaHeight() {
            const textarea = document.getElementById('aspirasi-area');
            if (!textarea) return;

            // Reset height to avoid compound growth
            textarea.style.height = 'auto';

            // Set to scrollHeight but limit to max-height
            const newHeight = Math.min(textarea.scrollHeight, 300);
            textarea.style.height = newHeight + 'px';
        },

        init() {
            const textarea = document.getElementById('aspirasi-area');
            if (textarea) {
                this.charCount = textarea.value.length;

                // Initial resize if there's content
                if (textarea.value) {
                    this.adjustTextareaHeight();
                    this.updateFormattedContent();
                }

                // Set up input event handler
                textarea.addEventListener('input', () => {
                    this.charCount = textarea.value.length;
                    this.adjustTextareaHeight();

                    // Update formatted content if in preview mode
                    if (this.previewMode) {
                        this.updateFormattedContent();
                    }
                });
            }
        }
    }));
};



/**
 * Initialize Aspirasi Home functionality
 * Handles captcha refresh and other aspirasi page interactions
 */
const initAspirasiHome = () => {
    Alpine.data('aspirasiForm', () => ({
        isLoading: false,
        charCount: 0,

        init() {
            // Initialize character count
            this.$nextTick(() => {
                const textarea = document.getElementById('aspirasi-area');
                if (textarea) {
                    this.charCount = textarea.value.length;
                    this.setupTextareaHandlers(textarea);
                }
            });
        },

        setupTextareaHandlers(textarea) {
            // Auto-resize functionality
            textarea.addEventListener('input', () => {
                // Update character count
                this.charCount = textarea.value.length;

                // Reset height to avoid compound growth
                textarea.style.height = 'auto';

                // Set to scrollHeight but limit to max-height
                const newHeight = Math.min(textarea.scrollHeight, 300);
                textarea.style.height = newHeight + 'px';
            });

            // Initial resize if there's content
            if (textarea.value) {
                textarea.style.height = 'auto';
                textarea.style.height = Math.min(textarea.scrollHeight, 300) + 'px';
            }
        },

        // Format text functions
        formatText(format) {
            const textarea = document.getElementById('aspirasi-area');
            if (!textarea) return;

            const selectionStart = textarea.selectionStart;
            const selectionEnd = textarea.selectionEnd;
            const selectedText = textarea.value.substring(selectionStart, selectionEnd);

            let formattedText = '';
            let cursorPosition = 0;

            switch (format) {
                case 'bold':
                    formattedText = `**${selectedText}**`;
                    cursorPosition = selectionStart + 2;
                    break;
                case 'italic':
                    formattedText = `*${selectedText}*`;
                    cursorPosition = selectionStart + 1;
                    break;
                case 'code':
                    formattedText = `\`${selectedText}\``;
                    cursorPosition = selectionStart + 1;
                    break;
            }

            // Replace the selected text with the formatted text
            const textBefore = textarea.value.substring(0, selectionStart);
            const textAfter = textarea.value.substring(selectionEnd);

            textarea.value = textBefore + formattedText + textAfter;
            this.charCount = textarea.value.length;

            // Set the cursor position
            if (selectedText.length > 0) {
                // If text was selected, place cursor after the formatted text
                textarea.selectionStart = selectionStart + formattedText.length;
                textarea.selectionEnd = selectionStart + formattedText.length;
            } else {
                // If no text was selected, place cursor inside the formatting tags
                textarea.selectionStart = cursorPosition;
                textarea.selectionEnd = cursorPosition;
            }

            // Focus back on the textarea
            textarea.focus();

            // Trigger resize after format
            this.setupTextareaHandlers(textarea);
        },

        refreshCaptcha() {
            this.isLoading = true;

            // Fetch new captcha from the server using AJAX
            fetch('/reload-captcha')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Create a new image object to preload
                    const newImage = new Image();

                    // When image loads, update the source
                    newImage.onload = () => {
                        document.getElementById('captcha-image').src = data.captcha;
                        this.isLoading = false;
                    };

                    // Handle loading errors
                    newImage.onerror = () => {
                        console.error("Failed to load new captcha image");
                        this.isLoading = false;

                        // Fallback - force a page reload for the captcha
                        document.getElementById('captcha-image').src = '/captcha/math?' + new Date().getTime();
                    };

                    // Start loading the new image
                    newImage.src = data.captcha;
                })
                .catch(error => {
                    console.error('Error refreshing captcha:', error);
                    this.isLoading = false;

                    // Fallback - force a simple reload if AJAX fails
                    document.getElementById('captcha-image').src = '/captcha/math?' + new Date().getTime();
                });
        },

        toggleAnonymous() {
            const nameInput = document.getElementById('name');
            const isAnonymous = document.getElementById('is_anonymous').checked;

            if (nameInput) {
                nameInput.disabled = isAnonymous;
                if (isAnonymous) {
                    nameInput.value = '';
                }
            }
        }
    }));
};

function adjustContentPadding() {
    const nav = document.querySelector('nav');
    const main = document.querySelector('main');
    if (nav && main) {
        const navHeight = nav.offsetHeight;
        main.style.paddingTop = `${navHeight}px`;
    }
}

// Initialize on document ready
document.addEventListener('DOMContentLoaded', () => {
    adjustContentPadding();
    initNavigationAndModal();
    if (document.getElementById('aspirasi-form')) {
        initAspirasiHome();
    }
    if (document.getElementById('aspirasi-area')) {
        initAspirasiField();
    }
    if (document.getElementById('aspirasiModal')) {
        initAspirasiModals();
    }
});

window.addEventListener('resize', adjustContentPadding);
Alpine.start();