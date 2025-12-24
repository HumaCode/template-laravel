@extends('layouts.app')

@section('title', 'Form Components')

@section('content')

{{-- Page Header --}}
<div class="mb-4">
    <h2 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary); margin-bottom: 4px;">
        Form Components
    </h2>
    <p style="color: var(--text-secondary); font-size: 0.9375rem;">
        Various form input components and styles for your dashboard.
    </p>
</div>

<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px;">
    
    {{-- Basic Inputs Card --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Basic Inputs</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label class="form-label">
                    Full Name <span class="required">*</span>
                </label>
                <input type="text" class="form-input" placeholder="Enter your full name">
            </div>
            
            <div class="form-group">
                <label class="form-label">
                    Email Address <span class="required">*</span>
                </label>
                <input type="email" class="form-input" placeholder="Enter your email">
                <p class="form-hint">We'll never share your email with anyone else.</p>
            </div>
            
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" class="form-input" placeholder="Enter password">
            </div>
            
            <div class="form-group">
                <label class="form-label">With Error State</label>
                <input type="text" class="form-input error" placeholder="Something went wrong" value="Invalid input">
                <p class="form-error">This field is required and cannot be empty.</p>
            </div>
            
            <div class="form-group">
                <label class="form-label">Disabled Input</label>
                <input type="text" class="form-input" placeholder="Disabled input" disabled>
            </div>
        </div>
    </div>
    
    {{-- Select & Textarea Card --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Select & Textarea</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label class="form-label">Select Option</label>
                <select class="form-select">
                    <option value="">Choose an option</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Country</label>
                <select class="form-select">
                    <option value="">Select your country</option>
                    <option value="us">United States</option>
                    <option value="uk">United Kingdom</option>
                    <option value="ca">Canada</option>
                    <option value="au">Australia</option>
                    <option value="id">Indonesia</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Message</label>
                <textarea class="form-textarea" placeholder="Write your message here..."></textarea>
            </div>
            
            <div class="form-group">
                <label class="form-label">Bio</label>
                <textarea class="form-textarea" placeholder="Tell us about yourself..." style="min-height: 100px;"></textarea>
                <p class="form-hint">Maximum 500 characters</p>
            </div>
        </div>
    </div>
    
    {{-- Checkboxes & Radios Card --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Checkboxes & Radio Buttons</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label class="form-label">Checkboxes</label>
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input" checked>
                        <span class="form-check-label">Remember me</span>
                    </label>
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <span class="form-check-label">Subscribe to newsletter</span>
                    </label>
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <span class="form-check-label">I agree to terms and conditions</span>
                    </label>
                </div>
            </div>
            
            <div class="form-group mt-4">
                <label class="form-label">Radio Buttons</label>
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <label class="form-check">
                        <input type="radio" class="form-check-input" name="gender" checked>
                        <span class="form-check-label">Male</span>
                    </label>
                    <label class="form-check">
                        <input type="radio" class="form-check-input" name="gender">
                        <span class="form-check-label">Female</span>
                    </label>
                    <label class="form-check">
                        <input type="radio" class="form-check-input" name="gender">
                        <span class="form-check-label">Other</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Toggle Switches Card --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Toggle Switches</h3>
        </div>
        <div class="card-body">
            <div style="display: flex; flex-direction: column; gap: 20px;">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <h4 style="font-size: 0.9375rem; font-weight: 600; color: var(--text-primary);">Email Notifications</h4>
                        <p style="font-size: 0.8125rem; color: var(--text-secondary);">Receive email notifications for updates</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>
                
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <h4 style="font-size: 0.9375rem; font-weight: 600; color: var(--text-primary);">Push Notifications</h4>
                        <p style="font-size: 0.8125rem; color: var(--text-secondary);">Enable push notifications on mobile</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox">
                        <span class="toggle-slider"></span>
                    </label>
                </div>
                
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <h4 style="font-size: 0.9375rem; font-weight: 600; color: var(--text-primary);">Two-Factor Auth</h4>
                        <p style="font-size: 0.8125rem; color: var(--text-secondary);">Add extra security to your account</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>
                
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <h4 style="font-size: 0.9375rem; font-weight: 600; color: var(--text-primary);">Marketing Emails</h4>
                        <p style="font-size: 0.8125rem; color: var(--text-secondary);">Receive marketing and promo emails</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox">
                        <span class="toggle-slider"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    
</div>

{{-- Buttons Card --}}
<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Buttons</h3>
    </div>
    <div class="card-body">
        <div style="display: flex; flex-wrap: wrap; gap: 16px; margin-bottom: 24px;">
            <button class="btn btn-primary">Primary</button>
            <button class="btn btn-secondary">Secondary</button>
            <button class="btn btn-success">Success</button>
            <button class="btn btn-danger">Danger</button>
            <button class="btn btn-outline">Outline</button>
        </div>
        
        <div style="display: flex; flex-wrap: wrap; gap: 16px; margin-bottom: 24px;">
            <button class="btn btn-primary btn-sm">Small</button>
            <button class="btn btn-primary">Default</button>
            <button class="btn btn-primary btn-lg">Large</button>
        </div>
        
        <div style="display: flex; flex-wrap: wrap; gap: 16px;">
            <button class="btn btn-primary">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"/>
                    <line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
                Add New
            </button>
            <button class="btn btn-success">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                    <polyline points="17 21 17 13 7 13 7 21"/>
                    <polyline points="7 3 7 8 15 8"/>
                </svg>
                Save Changes
            </button>
            <button class="btn btn-danger">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="3 6 5 6 21 6"/>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                </svg>
                Delete
            </button>
        </div>
    </div>
</div>

@endsection
