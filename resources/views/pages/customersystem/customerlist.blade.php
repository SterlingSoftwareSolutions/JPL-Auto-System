@extends('layouts.layout')

@section('content')
<style>
    .customer-system-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1rem;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        background-color: #f8fafc;
        min-height: calc(100vh - 100px);
    }
    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #ffffff;
        padding: 1.5rem 2rem;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
    }
    .header-titles h1 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1a202c;
        margin: 0 0 0.5rem 0;
    }
    .header-titles p {
        color: #718096;
        margin: 0;
        font-size: 0.9rem;
    }
    .dashboard-floating-btn {
        position: absolute;
        top: 104px;
        right: 24px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        background: #ffffff;
        color: #1e293b;
        font-size: 14px;
        font-weight: 600;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        text-decoration: none;
        transition: all 0.2s ease;
        z-index: 100;
    }
    .dashboard-floating-btn:hover {
        background: #f8fafc;
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        transform: translateY(-1px);
    }

    .main-grid {
        display: grid;
        grid-template-columns: 350px 1fr;
        gap: 2rem;
        align-items: start;
    }
    .form-card {
        background: #ffffff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        border: 1px solid #e2e8f0;
    }
    .form-header {
        background: #000000;
        color: #ffffff;
        padding: 1rem 1.5rem;
        font-weight: 600;
    }
    .form-body {
        padding: 1.5rem;
    }
    .form-group {
        margin-bottom: 1.25rem;
    }
    .form-group label {
        display: block;
        font-size: 0.875rem;
        font-weight: 500;
        color: #4a5568;
        margin-bottom: 0.5rem;
    }
    .form-group label span {
        color: #e53e3e;
    }
    .form-control {
        width: 100%;
        padding: 0.625rem;
        border: 1px solid #cbd5e0;
        border-radius: 4px;
        font-size: 0.875rem;
        color: #4a5568;
        background-color: #ffffff;
        box-sizing: border-box;
        transition: border-color 0.2s;
    }
    .form-control:focus {
        outline: none;
        border-color: #4299e1;
        box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1);
    }
    .btn-submit {
        width: 100%;
        background-color: #000000;
        color: #ffffff;
        padding: 0.75rem;
        border: none;
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s;
        margin-top: 1rem;
    }
    .btn-submit:hover {
        background-color: #1a202c;
    }
    .list-card {
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        border: 1px solid #e2e8f0;
        overflow: hidden;
    }
    .list-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #e2e8f0;
    }
    .list-header h2 {
        margin: 0;
        font-size: 1.125rem;
        color: #1a202c;
    }
    .list-count {
        background: #edf2f7;
        color: #4a5568;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .list-table-container {
        width: 100%;
        overflow-x: auto;
    }
    table.customer-table {
        width: 100%;
        border-collapse: collapse;
    }
    table.customer-table th {
        background-color: #f7fafc;
        color: #718096;
        text-transform: uppercase;
        font-size: 0.75rem;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        text-align: left;
        letter-spacing: 0.05em;
        border-bottom: 1px solid #e2e8f0;
    }
    table.customer-table td {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #e2e8f0;
        color: #4a5568;
        font-size: 0.875rem;
        vertical-align: top;
    }
    table.customer-table tr:last-child td {
        border-bottom: none;
    }
    .customer-name {
        font-weight: 600;
        color: #1a202c;
    }
    .customer-email {
        color: #718096;
        font-size: 0.8rem;
    }
    .interest-badge {
        display: inline-block;
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .interest-low {
        background-color: #ebf8ff;
        color: #2b6cb0;
    }
    .interest-medium {
        background-color: #faf5ff;
        color: #6b46c1;
    }
    .interest-high {
        background-color: #fff5f5;
        color: #c53030;
    }
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #718096;
    }
    .empty-icon {
        font-size: 3rem;
        color: #cbd5e0;
        margin-bottom: 1rem;
    }
    .empty-state h3 {
        color: #4a5568;
        font-size: 1.125rem;
        margin: 0 0 0.5rem 0;
    }
    .empty-state p {
        margin: 0;
        font-size: 0.875rem;
    }
    .alert {
        padding: 1rem;
        margin-bottom: 1rem;
        border-radius: 4px;
        font-size: 0.875rem;
    }
    .alert-success {
        background-color: #f0fff4;
        border: 1px solid #c6f6d5;
        color: #2f855a;
    }
    .alert-error {
        background-color: #fff5f5;
        border: 1px solid #fed7d7;
        color: #c53030;
    }
    .alert ul {
        margin: 0;
        padding-left: 1.5rem;
    }

    @media (max-width: 900px) {
        .main-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<a href="{{ route('dashboard') }}" class="dashboard-floating-btn">
    <svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
    Dashboard
</a>

<div class="customer-system-container">
    <div class="header-section">
        <div class="header-titles">
            <h1>Customer System</h1>
            <p>Manage and track your prospective and active customers.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="main-grid">
        <!-- Add Customer Form -->
        <div class="form-card">
            <div class="form-header">
                Add Customer
            </div>
            <div class="form-body">
                <form action="{{ route('customerstore') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name <span>*</span></label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="John Doe" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" id="contact_number" name="contact_number" class="form-control" placeholder="+1 (555) 000-0000" value="{{ old('contact_number') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="contact_email">Contact Email</label>
                        <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="john@example.com" value="{{ old('contact_email') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="interest_level">Interest Level <span>*</span></label>
                        <select id="interest_level" name="interest_level" class="form-control" required>
                            <option value="Low" {{ old('interest_level') == 'Low' ? 'selected' : '' }}>Low</option>
                            <option value="Medium" {{ old('interest_level') == 'Medium' ? 'selected' : '' }}>Medium</option>
                            <option value="High" {{ old('interest_level') == 'High' ? 'selected' : '' }}>High</option>
                        </select>
                    </div>

                    <button type="submit" class="btn-submit">Save Customer</button>
                </form>
            </div>
        </div>

        <!-- Customer List -->
        <div class="list-card">
            <div class="list-header">
                <h2>Customer List</h2>
                <div class="list-count">{{ $customers->count() ?? 0 }} Total</div>
            </div>
            
            @if(isset($customers) && $customers->count() > 0)
            <div class="list-table-container">
                <table class="customer-table">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Contact Details</th>
                            <th>Interest</th>
                            <th>Added</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>
                                <div class="customer-name">{{ $customer->name }}</div>
                            </td>
                            <td>
                                <div>{{ $customer->contact_number }}</div>
                                <div class="customer-email">{{ $customer->contact_email }}</div>
                            </td>
                            <td>
                                <span class="interest-badge interest-{{ strtolower($customer->interest_level) }}">
                                    {{ $customer->interest_level }}
                                </span>
                            </td>
                            <td>
                                {{ $customer->created_at->format('M d, Y') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="empty-state">
                <div class="empty-icon">
                    <svg style="width:48px;height:48px;margin:auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h3>No customers found.</h3>
                <p>Add a customer using the form to get started.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
