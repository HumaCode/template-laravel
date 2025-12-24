/**
 * ============================================
 * PANDU DASHBOARD - Interactive JavaScript
 * Modern Admin Panel Interactions
 * ============================================
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components
    initSidebar();
    initUserDropdown();
    initLogoutModal();
    initDataTable();
    initSubmenu();
    initAnimations();
    initSearchShortcut();
});

/**
 * ============================================
 * Sidebar Toggle (Mobile & Desktop)
 * ============================================
 */
function initSidebar() {
    const menuToggle = document.querySelector('.menu-toggle');
    const sidebar = document.querySelector('.sidebar');
    const sidebarOverlay = document.querySelector('.sidebar-overlay');

    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('open');
            sidebarOverlay?.classList.toggle('active');
            document.body.style.overflow = sidebar.classList.contains('open') ? 'hidden' : '';
        });
    }

    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.remove('open');
            sidebarOverlay.classList.remove('active');
            document.body.style.overflow = '';
        });
    }

    // Close sidebar on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && sidebar?.classList.contains('open')) {
            sidebar.classList.remove('open');
            sidebarOverlay?.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
}

/**
 * ============================================
 * User Dropdown
 * ============================================
 */
function initUserDropdown() {
    const userDropdown = document.querySelector('.user-dropdown');
    const dropdownToggle = document.querySelector('.user-dropdown-toggle');

    if (!userDropdown || !dropdownToggle) return;

    dropdownToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        userDropdown.classList.toggle('open');
        
        // Add subtle animation
        if (userDropdown.classList.contains('open')) {
            animateDropdownItems();
        }
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!userDropdown.contains(e.target)) {
            userDropdown.classList.remove('open');
        }
    });

    // Close dropdown on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            userDropdown.classList.remove('open');
        }
    });
}

function animateDropdownItems() {
    const items = document.querySelectorAll('.dropdown-item');
    items.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateX(-10px)';
        
        setTimeout(() => {
            item.style.transition = 'all 0.2s ease-out';
            item.style.opacity = '1';
            item.style.transform = 'translateX(0)';
        }, index * 50);
    });
}

/**
 * ============================================
 * Logout Modal
 * ============================================
 */
function initLogoutModal() {
    const logoutBtn = document.querySelector('.logout-btn');
    const logoutModal = document.querySelector('.logout-modal');
    const modalOverlay = document.querySelector('.modal-overlay');
    const modalClose = document.querySelector('.modal-close');
    const cancelBtn = document.querySelector('.cancel-logout');
    const confirmBtn = document.querySelector('.confirm-logout');

    if (!logoutBtn || !logoutModal) return;

    // Open modal
    logoutBtn.addEventListener('click', function(e) {
        e.preventDefault();
        openModal(modalOverlay);
        
        // Close user dropdown
        document.querySelector('.user-dropdown')?.classList.remove('open');
    });

    // Close modal functions
    function closeModal() {
        modalOverlay.classList.remove('active');
    }

    if (modalClose) {
        modalClose.addEventListener('click', closeModal);
    }

    if (cancelBtn) {
        cancelBtn.addEventListener('click', closeModal);
    }

    if (modalOverlay) {
        modalOverlay.addEventListener('click', function(e) {
            if (e.target === modalOverlay) {
                closeModal();
            }
        });
    }

    // Confirm logout
    if (confirmBtn) {
        confirmBtn.addEventListener('click', function() {
            // Add loading state
            confirmBtn.innerHTML = `
                <svg class="spinner" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10" stroke-dasharray="32" stroke-dashoffset="32">
                        <animate attributeName="stroke-dashoffset" values="32;0" dur="0.8s" repeatCount="indefinite"/>
                    </circle>
                </svg>
                Logging out...
            `;
            confirmBtn.disabled = true;

            // Simulate logout (replace with actual logout logic)
            setTimeout(() => {
                // Redirect to login page or submit logout form
                // window.location.href = '/logout';
                
                // For demo, just close modal and show message
                closeModal();
                showNotification('Logged out successfully!', 'success');
                
                // Reset button
                confirmBtn.innerHTML = 'Yes, Logout';
                confirmBtn.disabled = false;
            }, 1500);
        });
    }

    // Close on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modalOverlay?.classList.contains('active')) {
            closeModal();
        }
    });
}

function openModal(modalOverlay) {
    if (modalOverlay) {
        modalOverlay.classList.add('active');
        
        // Animate modal icon
        const logoutIcon = modalOverlay.querySelector('.logout-icon');
        if (logoutIcon) {
            logoutIcon.style.animation = 'none';
            setTimeout(() => {
                logoutIcon.style.animation = 'scaleIn 0.3s ease-out';
            }, 10);
        }
    }
}

/**
 * ============================================
 * Data Table Functionality
 * ============================================
 */
function initDataTable() {
    const table = document.querySelector('.data-table');
    if (!table) return;

    // Initialize sorting
    initTableSort(table);
    
    // Initialize search
    initTableSearch();
    
    // Initialize pagination
    initPagination();
    
    // Initialize row hover effects
    initRowEffects(table);
}

function initTableSort(table) {
    const headers = table.querySelectorAll('th[data-sortable]');
    
    headers.forEach(header => {
        header.addEventListener('click', function() {
            const column = this.dataset.column;
            const currentOrder = this.dataset.order || 'asc';
            const newOrder = currentOrder === 'asc' ? 'desc' : 'asc';
            
            // Reset all headers
            headers.forEach(h => {
                h.classList.remove('sorted');
                h.dataset.order = '';
            });
            
            // Set current header
            this.classList.add('sorted');
            this.dataset.order = newOrder;
            
            // Update sort icon
            const sortIcon = this.querySelector('.sort-icon');
            if (sortIcon) {
                sortIcon.innerHTML = newOrder === 'asc' 
                    ? '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12l7-7 7 7"/></svg>'
                    : '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 19V5M5 12l7 7 7-7"/></svg>';
            }
            
            // Sort table rows
            sortTable(table, column, newOrder);
        });
    });
}

function sortTable(table, column, order) {
    const tbody = table.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    
    rows.sort((a, b) => {
        const aValue = a.querySelector(`td[data-column="${column}"]`)?.textContent.trim() || '';
        const bValue = b.querySelector(`td[data-column="${column}"]`)?.textContent.trim() || '';
        
        // Check if numeric
        const aNum = parseFloat(aValue.replace(/[^0-9.-]/g, ''));
        const bNum = parseFloat(bValue.replace(/[^0-9.-]/g, ''));
        
        if (!isNaN(aNum) && !isNaN(bNum)) {
            return order === 'asc' ? aNum - bNum : bNum - aNum;
        }
        
        return order === 'asc' 
            ? aValue.localeCompare(bValue)
            : bValue.localeCompare(aValue);
    });
    
    // Re-append rows with animation
    rows.forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateY(-10px)';
        tbody.appendChild(row);
        
        setTimeout(() => {
            row.style.transition = 'all 0.2s ease-out';
            row.style.opacity = '1';
            row.style.transform = 'translateY(0)';
        }, index * 30);
    });
}

function initTableSearch() {
    const searchInput = document.querySelector('.table-search input');
    const table = document.querySelector('.data-table');
    
    if (!searchInput || !table) return;
    
    let debounceTimer;
    
    searchInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        
        debounceTimer = setTimeout(() => {
            const searchTerm = this.value.toLowerCase().trim();
            const rows = table.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const matches = text.includes(searchTerm);
                
                if (matches) {
                    row.style.display = '';
                    row.style.animation = 'fadeIn 0.3s ease-out';
                } else {
                    row.style.display = 'none';
                }
            });
            
            // Update pagination info
            updatePaginationInfo();
        }, 300);
    });
}

function initPagination() {
    const paginationBtns = document.querySelectorAll('.pagination-btn[data-page]');
    const prevBtn = document.querySelector('.pagination-btn.prev');
    const nextBtn = document.querySelector('.pagination-btn.next');
    
    let currentPage = 1;
    const totalPages = paginationBtns.length;
    
    paginationBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const page = parseInt(this.dataset.page);
            goToPage(page);
        });
    });
    
    if (prevBtn) {
        prevBtn.addEventListener('click', function() {
            if (currentPage > 1) {
                goToPage(currentPage - 1);
            }
        });
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            if (currentPage < totalPages) {
                goToPage(currentPage + 1);
            }
        });
    }
    
    function goToPage(page) {
        currentPage = page;
        
        // Update active state
        paginationBtns.forEach(btn => {
            btn.classList.toggle('active', parseInt(btn.dataset.page) === page);
        });
        
        // Update prev/next buttons
        if (prevBtn) prevBtn.disabled = page === 1;
        if (nextBtn) nextBtn.disabled = page === totalPages;
        
        // Here you would typically fetch new data or show/hide rows
        // For demo, we'll just animate
        const table = document.querySelector('.data-table tbody');
        if (table) {
            table.style.opacity = '0';
            setTimeout(() => {
                table.style.transition = 'opacity 0.3s ease-out';
                table.style.opacity = '1';
            }, 100);
        }
    }
}

function updatePaginationInfo() {
    const visibleRows = document.querySelectorAll('.data-table tbody tr:not([style*="display: none"])').length;
    const totalRows = document.querySelectorAll('.data-table tbody tr').length;
    const infoElement = document.querySelector('.pagination-info');
    
    if (infoElement) {
        infoElement.textContent = `Showing ${visibleRows} of ${totalRows} entries`;
    }
}

function initRowEffects(table) {
    const rows = table.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.005)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
}

/**
 * ============================================
 * Sidebar Submenu
 * ============================================
 */
function initSubmenu() {
    const submenuItems = document.querySelectorAll('.nav-item.has-submenu');
    
    submenuItems.forEach(item => {
        const link = item.querySelector('.nav-link');
        
        if (link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Close other submenus
                submenuItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('open');
                    }
                });
                
                // Toggle current submenu
                item.classList.toggle('open');
            });
        }
    });
}

/**
 * ============================================
 * Scroll Animations
 * ============================================
 */
function initAnimations() {
    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe elements with animation classes
    document.querySelectorAll('.stat-card, .card').forEach(el => {
        observer.observe(el);
    });
    
    // Stagger animation for nav items
    const navItems = document.querySelectorAll('.nav-item');
    navItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 50}ms`;
    });
}

/**
 * ============================================
 * Search Shortcut (Ctrl/Cmd + K)
 * ============================================
 */
function initSearchShortcut() {
    const searchInput = document.querySelector('.search-input');
    
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            searchInput?.focus();
        }
    });
}

/**
 * ============================================
 * Notification Helper
 * ============================================
 */
function showNotification(message, type = 'info') {
    // Remove existing notification
    const existing = document.querySelector('.notification');
    if (existing) existing.remove();
    
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                ${type === 'success' 
                    ? '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="M22 4 12 14.01l-3-3"/>'
                    : '<circle cx="12" cy="12" r="10"/><path d="M12 8v4M12 16h.01"/>'}
            </svg>
            <span>${message}</span>
        </div>
        <button class="notification-close">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M18 6 6 18M6 6l12 12"/>
            </svg>
        </button>
    `;
    
    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 24px;
        right: 24px;
        padding: 16px 20px;
        background: ${type === 'success' ? '#ecfdf5' : '#f0f9ff'};
        border: 1px solid ${type === 'success' ? '#a7f3d0' : '#bae6fd'};
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        z-index: 3000;
        animation: slideInRight 0.3s ease-out;
    `;
    
    const content = notification.querySelector('.notification-content');
    content.style.cssText = `
        display: flex;
        align-items: center;
        gap: 12px;
        color: ${type === 'success' ? '#059669' : '#0284c7'};
        font-weight: 500;
    `;
    
    const closeBtn = notification.querySelector('.notification-close');
    closeBtn.style.cssText = `
        background: none;
        border: none;
        cursor: pointer;
        color: ${type === 'success' ? '#059669' : '#0284c7'};
        opacity: 0.6;
        transition: opacity 0.2s;
    `;
    
    closeBtn.addEventListener('mouseenter', () => closeBtn.style.opacity = '1');
    closeBtn.addEventListener('mouseleave', () => closeBtn.style.opacity = '0.6');
    closeBtn.addEventListener('click', () => notification.remove());
    
    document.body.appendChild(notification);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        notification.style.animation = 'slideInRight 0.3s ease-out reverse';
        setTimeout(() => notification.remove(), 300);
    }, 5000);
}

/**
 * ============================================
 * Filter Dropdown (for table filters)
 * ============================================
 */
function initFilterDropdowns() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Toggle filter dropdown
            const dropdown = this.nextElementSibling;
            if (dropdown && dropdown.classList.contains('filter-dropdown')) {
                dropdown.classList.toggle('open');
            }
        });
    });
}

/**
 * ============================================
 * Export Functions (for use in Blade templates)
 * ============================================
 */
window.Dashboard = {
    showNotification,
    openModal,
    initDataTable,
    sortTable
};
