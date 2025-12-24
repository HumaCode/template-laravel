@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

{{-- Page Header --}}
<div class="d-flex align-center justify-between mb-4">
    <div>
        <h2 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary); margin-bottom: 4px;">
            Welcome back, {{ auth()->user()->name ?? 'John' }}! 👋
        </h2>
        <p style="color: var(--text-secondary); font-size: 0.9375rem;">
            Here's what's happening with your business today.
        </p>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-outline btn-sm">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
            </svg>
            Export
        </button>
        <button class="btn btn-primary btn-sm">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Add New
        </button>
    </div>
</div>

{{-- Stats Cards --}}
<div class="stats-grid">

    {{-- Total Revenue --}}
    <div class="stat-card primary">
        <div class="stat-header">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="1" x2="12" y2="23"/>
                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                </svg>
            </div>
            <div class="stat-trend up">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 15l-6-6-6 6"/>
                </svg>
                12.5%
            </div>
        </div>
        <div class="stat-value">$45,234</div>
        <div class="stat-label">Total Revenue</div>
    </div>

    {{-- Total Orders --}}
    <div class="stat-card success">
        <div class="stat-header">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="9" cy="21" r="1"/>
                    <circle cx="20" cy="21" r="1"/>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                </svg>
            </div>
            <div class="stat-trend up">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 15l-6-6-6 6"/>
                </svg>
                8.2%
            </div>
        </div>
        <div class="stat-value">1,234</div>
        <div class="stat-label">Total Orders</div>
    </div>

    {{-- Total Customers --}}
    <div class="stat-card warning">
        <div class="stat-header">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
            <div class="stat-trend up">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 15l-6-6-6 6"/>
                </svg>
                5.7%
            </div>
        </div>
        <div class="stat-value">8,456</div>
        <div class="stat-label">Total Customers</div>
    </div>

    {{-- Conversion Rate --}}
    <div class="stat-card info">
        <div class="stat-header">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                </svg>
            </div>
            <div class="stat-trend down">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M6 9l6 6 6-6"/>
                </svg>
                2.3%
            </div>
        </div>
        <div class="stat-value">3.24%</div>
        <div class="stat-label">Conversion Rate</div>
    </div>

</div>

{{-- Data Table Card --}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Recent Users</h3>
        <div class="card-actions">
            <button class="btn btn-outline btn-sm">View All</button>
        </div>
    </div>
    <div class="card-body">
        {{-- Table Header Actions --}}
        <div class="table-header">
            <div class="table-search">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                <input type="text" placeholder="Search users...">
            </div>
            <div class="table-filters">
                <button class="filter-btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
                    </svg>
                    Filter
                </button>
                <button class="filter-btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                    Date Range
                </button>
            </div>
        </div>

        {{-- Data Table --}}
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th data-sortable data-column="name">
                            User
                            <span class="sort-icon">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 5v14M5 12l7 7 7-7"/>
                                </svg>
                            </span>
                        </th>
                        <th data-sortable data-column="email">
                            Email
                            <span class="sort-icon">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 5v14M5 12l7 7 7-7"/>
                                </svg>
                            </span>
                        </th>
                        <th data-sortable data-column="role">
                            Role
                            <span class="sort-icon">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 5v14M5 12l7 7 7-7"/>
                                </svg>
                            </span>
                        </th>
                        <th data-sortable data-column="status">
                            Status
                            <span class="sort-icon">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 5v14M5 12l7 7 7-7"/>
                                </svg>
                            </span>
                        </th>
                        <th data-sortable data-column="date">
                            Joined
                            <span class="sort-icon">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 5v14M5 12l7 7 7-7"/>
                                </svg>
                            </span>
                        </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Sample Data Rows --}}
                    <tr>
                        <td data-column="name">
                            <div class="user-cell">
                                <img src="https://ui-avatars.com/api/?name=Sarah+Wilson&background=6366f1&color=fff" alt="Avatar" class="user-cell-avatar">
                                <div class="user-cell-info">
                                    <h4>Sarah Wilson</h4>
                                    <p>Product Designer</p>
                                </div>
                            </div>
                        </td>
                        <td data-column="email">sarah.wilson@example.com</td>
                        <td data-column="role">Admin</td>
                        <td data-column="status">
                            <span class="status-badge active">Active</span>
                        </td>
                        <td data-column="date">Dec 15, 2024</td>
                        <td>
                            <div class="table-actions">
                                <button class="action-btn view" title="View">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                                <button class="action-btn edit" title="Edit">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                    </svg>
                                </button>
                                <button class="action-btn delete" title="Delete">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6"/>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td data-column="name">
                            <div class="user-cell">
                                <img src="https://ui-avatars.com/api/?name=Michael+Chen&background=14b8a6&color=fff" alt="Avatar" class="user-cell-avatar">
                                <div class="user-cell-info">
                                    <h4>Michael Chen</h4>
                                    <p>Software Engineer</p>
                                </div>
                            </div>
                        </td>
                        <td data-column="email">michael.chen@example.com</td>
                        <td data-column="role">Editor</td>
                        <td data-column="status">
                            <span class="status-badge active">Active</span>
                        </td>
                        <td data-column="date">Dec 12, 2024</td>
                        <td>
                            <div class="table-actions">
                                <button class="action-btn view" title="View">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                                <button class="action-btn edit" title="Edit">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                    </svg>
                                </button>
                                <button class="action-btn delete" title="Delete">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6"/>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td data-column="name">
                            <div class="user-cell">
                                <img src="https://ui-avatars.com/api/?name=Emily+Davis&background=f59e0b&color=fff" alt="Avatar" class="user-cell-avatar">
                                <div class="user-cell-info">
                                    <h4>Emily Davis</h4>
                                    <p>Marketing Lead</p>
                                </div>
                            </div>
                        </td>
                        <td data-column="email">emily.davis@example.com</td>
                        <td data-column="role">Viewer</td>
                        <td data-column="status">
                            <span class="status-badge pending">Pending</span>
                        </td>
                        <td data-column="date">Dec 10, 2024</td>
                        <td>
                            <div class="table-actions">
                                <button class="action-btn view" title="View">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                                <button class="action-btn edit" title="Edit">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                    </svg>
                                </button>
                                <button class="action-btn delete" title="Delete">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6"/>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td data-column="name">
                            <div class="user-cell">
                                <img src="https://ui-avatars.com/api/?name=James+Brown&background=0ea5e9&color=fff" alt="Avatar" class="user-cell-avatar">
                                <div class="user-cell-info">
                                    <h4>James Brown</h4>
                                    <p>Data Analyst</p>
                                </div>
                            </div>
                        </td>
                        <td data-column="email">james.brown@example.com</td>
                        <td data-column="role">Editor</td>
                        <td data-column="status">
                            <span class="status-badge inactive">Inactive</span>
                        </td>
                        <td data-column="date">Dec 8, 2024</td>
                        <td>
                            <div class="table-actions">
                                <button class="action-btn view" title="View">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                                <button class="action-btn edit" title="Edit">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                    </svg>
                                </button>
                                <button class="action-btn delete" title="Delete">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6"/>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td data-column="name">
                            <div class="user-cell">
                                <img src="https://ui-avatars.com/api/?name=Olivia+Martinez&background=f43f5e&color=fff" alt="Avatar" class="user-cell-avatar">
                                <div class="user-cell-info">
                                    <h4>Olivia Martinez</h4>
                                    <p>HR Manager</p>
                                </div>
                            </div>
                        </td>
                        <td data-column="email">olivia.m@example.com</td>
                        <td data-column="role">Admin</td>
                        <td data-column="status">
                            <span class="status-badge active">Active</span>
                        </td>
                        <td data-column="date">Dec 5, 2024</td>
                        <td>
                            <div class="table-actions">
                                <button class="action-btn view" title="View">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                                <button class="action-btn edit" title="Edit">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                    </svg>
                                </button>
                                <button class="action-btn delete" title="Delete">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6"/>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="table-pagination">
            <div class="pagination-info">
                Showing 1 to 5 of 25 entries
            </div>
            <div class="pagination-controls">
                <button class="pagination-btn prev" disabled>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"/>
                    </svg>
                </button>
                <button class="pagination-btn active" data-page="1">1</button>
                <button class="pagination-btn" data-page="2">2</button>
                <button class="pagination-btn" data-page="3">3</button>
                <button class="pagination-btn" data-page="4">4</button>
                <button class="pagination-btn" data-page="5">5</button>
                <button class="pagination-btn next">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
