@props(['eventRequest' => \App\Models\EventRequest::class])

@php
    $imageUrl = $eventRequest->image ? asset('storage/' . $eventRequest->image) : asset('placeholder.svg');
@endphp

<div class="event-card bg-white rounded-lg border border-gray-200 overflow-hidden">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Image -->
        <div class="lg:col-span-1">
            <div class="aspect-video lg:aspect-square w-full bg-gray-100 rounded-lg overflow-hidden">
                <img src="{{ $imageUrl }}" alt="Event Image" class="w-full h-full object-cover" />
            </div>
        </div>

        <!-- Content -->
        <div class="lg:col-span-3 space-y-4">
            <!-- Header -->
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $eventRequest->title }}</h3>
                    <div class="flex items-center text-sm text-gray-600 mb-2">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        {{ $eventRequest->location }}
                    </div>
                </div>
                <span class="status-badge status-{{ $eventRequest->approval_status }}">
                    {{ ucfirst($eventRequest->approval_status) }}
                </span>
            </div>

            <!-- Description -->
            <p class="text-gray-700 line-clamp-2">{{ $eventRequest->description }}</p>

            <!-- Details Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div class="space-y-2">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v16a2 2 0 002 2z"></path>
                        </svg>
                        <span class="font-medium text-gray-900">Date:</span>
                    </div>
                    <p class="text-gray-700 ml-6">
                        {{ \Carbon\Carbon::parse($eventRequest->start_datetime)->format('M j, Y g:i A') }} - 
                        {{ \Carbon\Carbon::parse($eventRequest->end_datetime)->format('M j, Y g:i A') }}
                    </p>
                    
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        <span class="font-medium text-gray-900">Category:</span>
                    </div>
                    <p class="text-gray-700 ml-6">{{ $eventRequest->category }}</p>
                </div>

                <div class="space-y-2">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                        <span class="font-medium text-gray-900">Fee:</span>
                    </div>
                    <p class="text-gray-700 ml-6">
                        {{ $eventRequest->is_free ? 'Free Entry' : '$' . number_format($eventRequest->price, 2) }}
                    </p>
                    
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="font-medium text-gray-900">Contact:</span>
                    </div>
                    <div class="ml-6 space-y-1">
                        <a href="mailto:{{ $eventRequest->requester_email }}" class="text-blue-600 hover:text-blue-800 block">
                            {{ $eventRequest->requester_email }}
                        </a>
                        @if ($eventRequest->requester_phone)
                            <a href="tel:{{ $eventRequest->requester_phone }}" class="text-blue-600 hover:text-blue-800 block">
                                {{ $eventRequest->requester_phone }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            @if ($eventRequest->reference_link)
                <div class="border-t border-gray-200 pt-4">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                        </svg>
                        <span class="font-medium text-gray-900">Reference:</span>
                    </div>
                    <a href="{{ $eventRequest->reference_link }}" target="_blank" 
                       class="text-blue-600 hover:text-blue-800 ml-6 break-all">
                        {{ $eventRequest->reference_link }}
                    </a>
                </div>
            @endif

            <!-- Actions -->
            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                <a href="{{ route('admin.dashboard.events.requests.edit', ['id' => $eventRequest->id]) }}"
                   class="btn-secondary inline-flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit
                </a>
                
                <form method="POST" action="{{ route('admin.dashboard.events.requests.reject', ['id' => $eventRequest->id]) }}"
                      onsubmit="return confirm('Are you sure you want to reject and delete this request?');" class="inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Reject
                    </button>
                </form>
                
                <form method="POST" action="{{ route('admin.dashboard.events.requests.approve', ['id' => $eventRequest->id]) }}" class="inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn-primary inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Approve
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>