{{-- Logout Modal Component --}}
<div class="modal-overlay logout-modal">
    <div class="modal">
        
        {{-- Modal Header --}}
        <div class="modal-header">
            <h3 class="modal-title">Confirm Logout</h3>
            <button class="modal-close" aria-label="Close Modal">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"/>
                    <line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>
        
        {{-- Modal Body --}}
        <div class="modal-body">
            <div class="logout-modal-content">
                {{-- Animated Icon --}}
                <div class="logout-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>
                </div>
                
                <h3>Are you sure you want to logout?</h3>
                <p>You will be logged out of your account and redirected to the login page.</p>
            </div>
        </div>
        
        {{-- Modal Footer --}}
        <div class="modal-footer">
            <button class="btn btn-secondary cancel-logout">
                Cancel
            </button>
            <button class="btn btn-danger confirm-logout">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
                Yes, Logout
            </button>
        </div>
        
    </div>
</div>
