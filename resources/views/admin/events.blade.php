@extends('layouts.app_admin')

@section('page-title', 'Published Events')
@section('page-description', 'View and manage all approved events')

@section('content')
    <div class="fade-in">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="stats-card">
                <div class="flex items-center">
                    <div class="stats-icon bg-green-100 text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $events->count() }}</h3>
                        <p class="text-sm text-gray-600">Published Events</p>
                    </div>
                </div>
            </div>
            
            <div class="stats-card">
                <div class="flex items-center">
                    <div class="stats-icon bg-blue-100 text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v16a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-white-900">{{ $events->where('is_free', true)->count() }}</h3>
                        <p class="text-sm text-gray-600">Free Events</p>
                    </div>
                </div>
            </div>
            
            <div class="stats-card">
                <div class="flex items-center">
                    <div class="stats-icon bg-purple-100 text-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-white-900">{{ $events->where('is_free', false)->count() }}</h3>
                        <p class="text-sm text-gray-600">Paid Events</p>
                    </div>
                </div>
            </div>

            <div class="stats-card">
                <div class="flex items-center">
                    <div class="stats-icon bg-orange-100 text-orange-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-white-900">{{ \App\Models\User::count() }}</h3>
                        <p class="text-sm text-gray-600">Total Users</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 mb-6">
            <div class="flex flex-wrap items-center gap-4">
                <div class="flex items-center space-x-2">
                    <label for="category-filter" class="text-sm font-medium text-gray-700">Category:</label>
                    <select id="category-filter" class="form-input text-sm py-2">
                        <option value="">All Categories</option>
                        @foreach (\App\Models\EventRequest::getCategories() as $category)
                            <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center space-x-2">
                    <label for="area-filter" class="text-sm font-medium text-gray-700">Area:</label>
                    <select id="area-filter" class="form-input text-sm py-2">
                        <option value="">All Areas</option>
                        @foreach (\App\Models\EventRequest::getAreas() as $area)
                            <option value="{{ $area }}">{{ $area }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center space-x-2">
                    <label for="fee-filter" class="text-sm font-medium text-gray-700">Fee:</label>
                    <select id="fee-filter" class="form-input text-sm py-2">
                        <option value="">All Events</option>
                        <option value="free">Free Only</option>
                        <option value="paid">Paid Only</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Published Events -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Published Events</h2>
                <p class="text-sm text-gray-600">All approved and published events</p>
            </div>
            
            <div class="divide-y divide-gray-200" id="events-container">
                @forelse ($events as $event)
                    <div class="p-6 event-card border-0 hover:bg-gray-50" 
                         data-category="{{ $event->category }}" 
                         data-area="{{ $event->area }}" 
                         data-fee="{{ $event->is_free ? 'free' : 'paid' }}">
                        <x-admin.published-event-card :event="$event" />
                    </div>
                @empty
                    <div class="p-12 text-center">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v16a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No published events</h3>
                        <p class="text-gray-500">No events have been published yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        // Filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const categoryFilter = document.getElementById('category-filter');
            const areaFilter = document.getElementById('area-filter');
            const feeFilter = document.getElementById('fee-filter');
            const eventsContainer = document.getElementById('events-container');
            
            function filterEvents() {
                const categoryValue = categoryFilter.value.toLowerCase();
                const areaValue = areaFilter.value.toLowerCase();
                const feeValue = feeFilter.value.toLowerCase();
                
                const eventCards = eventsContainer.querySelectorAll('.event-card');
                let visibleCount = 0;
                
                eventCards.forEach(card => {
                    const category = card.dataset.category.toLowerCase();
                    const area = card.dataset.area.toLowerCase();
                    const fee = card.dataset.fee.toLowerCase();
                    
                    const categoryMatch = !categoryValue || category.includes(categoryValue);
                    const areaMatch = !areaValue || area.includes(areaValue);
                    const feeMatch = !feeValue || fee === feeValue;
                    
                    if (categoryMatch && areaMatch && feeMatch) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });
                
                // Show/hide empty state
                const emptyState = eventsContainer.querySelector('.text-center');
                if (emptyState) {
                    emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
                }
            }
            
            categoryFilter.addEventListener('change', filterEvents);
            areaFilter.addEventListener('change', filterEvents);
            feeFilter.addEventListener('change', filterEvents);
        });
    </script>
@endsection