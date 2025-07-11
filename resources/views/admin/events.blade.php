@extends('layouts.app_admin')

@section('page-title', 'Published Events')
@section('page-description', 'View and manage all approved events')

@section('content')
    <div class="fade-in space-y-8">
        <!-- Enhanced Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-white transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold">{{ $events->count() }}</h3>
                        <p class="text-green-100 text-sm font-medium">Published Events</p>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <div class="w-full bg-white/20 rounded-full h-2">
                        <div class="bg-white h-2 rounded-full transition-all duration-1000" style="width: 85%"></div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-white transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold">{{ $events->where('is_free', true)->count() }}</h3>
                        <p class="text-blue-100 text-sm font-medium">Free Events</p>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v16a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <div class="w-full bg-white/20 rounded-full h-2">
                        <div class="bg-white h-2 rounded-full transition-all duration-1000" style="width: 65%"></div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-white transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold">{{ $events->where('is_free', false)->count() }}</h3>
                        <p class="text-purple-100 text-sm font-medium">Paid Events</p>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <div class="w-full bg-white/20 rounded-full h-2">
                        <div class="bg-white h-2 rounded-full transition-all duration-1000" style="width: 45%"></div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-white transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold">{{ \App\Models\User::count() }}</h3>
                        <p class="text-orange-100 text-sm font-medium">Total Users</p>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <div class="w-full bg-white/20 rounded-full h-2">
                        <div class="bg-white h-2 rounded-full transition-all duration-1000" style="width: 92%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Filter Bar -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-8 hover:shadow-xl transition-shadow duration-300">
            <div class="flex flex-wrap items-center gap-6">
                <!-- Filter Title -->
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.707A1 1 0 013 7V4z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Filter Events</h3>
                </div>

                <!-- Filter Controls -->
                <div class="flex flex-wrap items-center gap-4 flex-1">
                    <!-- Category Filter -->
                    <div class="flex items-center space-x-3 min-w-0">
                        <label for="category-filter" class="text-sm font-medium text-gray-700 whitespace-nowrap flex items-center">
                            <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Category:
                        </label>
                        <select id="category-filter" class="min-w-[150px] px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm font-medium text-gray-700 hover:border-purple-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 focus:outline-none transition-all duration-200 shadow-sm hover:shadow-md cursor-pointer">
                            <option value="" class="text-gray-500">All Categories</option>
                            @foreach (\App\Models\EventRequest::getCategories() as $category)
                                <option value="{{ $category }}" class="text-gray-700">{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Area Filter -->
                    <div class="flex items-center space-x-3 min-w-0">
                        <label for="area-filter" class="text-sm font-medium text-gray-700 whitespace-nowrap flex items-center">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Area:
                        </label>
                        <select id="area-filter" class="min-w-[130px] px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm font-medium text-gray-700 hover:border-green-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 focus:outline-none transition-all duration-200 shadow-sm hover:shadow-md cursor-pointer">
                            <option value="" class="text-gray-500">All Areas</option>
                            @foreach (\App\Models\EventRequest::getAreas() as $area)
                                <option value="{{ $area }}" class="text-gray-700">{{ $area }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Fee Filter -->
                    <div class="flex items-center space-x-3 min-w-0">
                        <label for="fee-filter" class="text-sm font-medium text-gray-700 whitespace-nowrap flex items-center">
                            <svg class="w-4 h-4 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                            Fee:
                        </label>
                        <select id="fee-filter" class="min-w-[120px] px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm font-medium text-gray-700 hover:border-orange-300 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 focus:outline-none transition-all duration-200 shadow-sm hover:shadow-md cursor-pointer">
                            <option value="" class="text-gray-500">All Events</option>
                            <option value="free" class="text-gray-700">Free Only</option>
                            <option value="paid" class="text-gray-700">Paid Only</option>
                        </select>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center space-x-3">
                    <!-- Clear Filters Button -->
                    <button id="clear-filters" class="inline-flex items-center px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-xl transition-all duration-200 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Clear
                    </button>
                    
                    <!-- Results Counter -->
                    <div class="flex items-center space-x-2 px-4 py-2.5 bg-blue-50 border border-blue-200 rounded-xl">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <span id="results-count" class="text-sm font-medium text-blue-700">{{ $events->count() }} events</span>
                    </div>
                </div>
            </div>

            <!-- Active Filters Display -->
            <div id="active-filters" class="mt-4 pt-4 border-t border-gray-100 hidden">
                <div class="flex items-center space-x-2">
                    <span class="text-sm font-medium text-gray-500">Active filters:</span>
                    <div id="filter-tags" class="flex flex-wrap gap-2"></div>
                </div>
            </div>
        </div>

        <!-- Published Events -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-5 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 flex items-center">
                            <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            Published Events
                        </h2>
                        <p class="text-sm text-gray-600 mt-1">All approved and published events</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                            {{ $events->count() }} published
                        </span>
                        <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                    </div>
                </div>
            </div>
            
            <div class="divide-y divide-gray-100" id="events-container">
                @forelse ($events as $event)
                    <div class="p-6 event-card hover:bg-gray-50/50 transition-colors duration-200" 
                         data-category="{{ $event->category }}" 
                         data-area="{{ $event->area }}" 
                         data-fee="{{ $event->is_free ? 'free' : 'paid' }}">
                        <x-admin.published-event-card :event="$event" />
                    </div>
                @empty
                    <div class="p-12 text-center">
                        <div class="w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v16a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">No events published yet</h3>
                        <p class="text-gray-500 max-w-md mx-auto">No events have been published yet. Approved events will appear here.</p>
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
            const clearFiltersBtn = document.getElementById('clear-filters');
            const resultsCount = document.getElementById('results-count');
            const activeFiltersDiv = document.getElementById('active-filters');
            const filterTagsDiv = document.getElementById('filter-tags');
            const eventsContainer = document.getElementById('events-container');
            
            // Add smooth animations to select elements
            [categoryFilter, areaFilter, feeFilter].forEach(select => {
                select.addEventListener('focus', function() {
                    this.classList.add('transform', 'scale-105');
                });
                
                select.addEventListener('blur', function() {
                    this.classList.remove('transform', 'scale-105');
                });
            });
            
            function updateActiveFilters() {
                const activeFilters = [];
                filterTagsDiv.innerHTML = '';
                
                if (categoryFilter.value) {
                    activeFilters.push({
                        type: 'Category',
                        value: categoryFilter.value,
                        color: 'purple'
                    });
                }
                
                if (areaFilter.value) {
                    activeFilters.push({
                        type: 'Area',
                        value: areaFilter.value,
                        color: 'green'
                    });
                }
                
                if (feeFilter.value) {
                    activeFilters.push({
                        type: 'Fee',
                        value: feeFilter.value === 'free' ? 'Free Only' : 'Paid Only',
                        color: 'orange'
                    });
                }
                
                if (activeFilters.length > 0) {
                    activeFiltersDiv.classList.remove('hidden');
                    activeFilters.forEach(filter => {
                        const tag = document.createElement('span');
                        tag.className = `inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-${filter.color}-100 text-${filter.color}-800 border border-${filter.color}-200`;
                        tag.innerHTML = `
                            ${filter.type}: ${filter.value}
                            <button onclick="clearSingleFilter('${filter.type.toLowerCase()}')" class="ml-2 text-${filter.color}-600 hover:text-${filter.color}-800">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        `;
                        filterTagsDiv.appendChild(tag);
                    });
                } else {
                    activeFiltersDiv.classList.add('hidden');
                }
            }
            
            function filterEvents() {
                const categoryValue = categoryFilter.value.toLowerCase();
                const areaValue = areaFilter.value.toLowerCase();
                const feeValue = feeFilter.value.toLowerCase();
                
                const eventCards = eventsContainer.querySelectorAll('.event-card');
                let visibleCount = 0;
                
                eventCards.forEach(card => {
                    const category = card.dataset.category?.toLowerCase() || '';
                    const area = card.dataset.area?.toLowerCase() || '';
                    const fee = card.dataset.fee?.toLowerCase() || '';
                    
                    const categoryMatch = !categoryValue || category.includes(categoryValue);
                    const areaMatch = !areaValue || area.includes(areaValue);
                    const feeMatch = !feeValue || fee === feeValue;
                    
                    if (categoryMatch && areaMatch && feeMatch) {
                        card.style.display = 'block';
                        card.classList.add('animate-fade-in');
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                        card.classList.remove('animate-fade-in');
                    }
                });
                
                // Update results counter with animation
                resultsCount.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    resultsCount.textContent = `${visibleCount} event${visibleCount !== 1 ? 's' : ''}`;
                    resultsCount.style.transform = 'scale(1)';
                }, 150);
                
                updateActiveFilters();
            }
            
            function clearAllFilters() {
                categoryFilter.value = '';
                areaFilter.value = '';
                feeFilter.value = '';
                
                // Add clearing animation
                [categoryFilter, areaFilter, feeFilter].forEach(select => {
                    select.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        select.style.transform = 'scale(1)';
                    }, 100);
                });
                
                filterEvents();
            }
            
            window.clearSingleFilter = function(filterType) {
                switch(filterType) {
                    case 'category':
                        categoryFilter.value = '';
                        break;
                    case 'area':
                        areaFilter.value = '';
                        break;
                    case 'fee':
                        feeFilter.value = '';
                        break;
                }
                filterEvents();
            };
            
            categoryFilter.addEventListener('change', filterEvents);
            areaFilter.addEventListener('change', filterEvents);
            feeFilter.addEventListener('change', filterEvents);
            clearFiltersBtn.addEventListener('click', clearAllFilters);
            
            // Initialize
            updateActiveFilters();
        });

        // Add CSS for animations
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fade-in {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }
            
            .animate-fade-in {
                animation: fade-in 0.3s ease-out;
            }
            
            select {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236B7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
                background-position: right 0.75rem center;
                background-repeat: no-repeat;
                background-size: 1.25em 1.25em;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                padding-right: 2.5rem;
            }
            
            select:hover {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%234B5563' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            }
        `;
        document.head.appendChild(style);
    </script>
@endsection