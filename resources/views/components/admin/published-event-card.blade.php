@props(['event' => \App\Models\EventRequest::class])

@php
    $imageUrl = $event->image ? asset('storage/' . $event->image) : asset('placeholder.svg');
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
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $event->title }}</h3>
                    <div class="flex items-center text-sm text-gray-600 mb-2">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        {{ $event->location }}
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="status-badge status-approved">
                        Published
                    </span>
                    <span class="px-2 py-1 text-xs font-medium rounded-full {{ $event->is_free ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                        {{ $event->is_free ? 'Free' : '$' . number_format($event->price, 2) }}
                    </span>
                </div>
            </div>

            <!-- Description -->
            <p class="text-gray-700 line-clamp-2">{{ $event->description }}</p>

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
                        {{ \Carbon\Carbon::parse($event->start_datetime)->format('M j, Y g:i A') }} - 
                        {{ \Carbon\Carbon::parse($event->end_datetime)->format('M j, Y g:i A') }}
                    </p>
                    
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        <span class="font-medium text-gray-900">Category:</span>
                    </div>
                    <p class="text-gray-700 ml-6">{{ $event->category }}</p>

                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <span class="font-medium text-gray-900">Type:</span>
                    </div>
                    <p class="text-gray-700 ml-6">{{ $event->event_type }}</p>
                </div>

                <div class="space-y-2">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="font-medium text-gray-900">Area:</span>
                    </div>
                    <p class="text-gray-700 ml-6">{{ $event->area }}</p>
                    
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span class="font-medium text-gray-900">Format:</span>
                    </div>
                    <p class="text-gray-700 ml-6">{{ $event->format }}</p>
                    
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="font-medium text-gray-900">Contact:</span>
                    </div>
                    <div class="ml-6 space-y-1">
                        <a href="mailto:{{ $event->requester_email }}" class="text-blue-600 hover:text-blue-800 block">
                            {{ $event->requester_email }}
                        </a>
                        @if ($event->requester_phone)
                            <a href="tel:{{ $event->requester_phone }}" class="text-blue-600 hover:text-blue-800 block">
                                {{ $event->requester_phone }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            @if ($event->reference_link)
                <div class="border-t border-gray-200 pt-4">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                        </svg>
                        <span class="font-medium text-gray-900">Reference:</span>
                    </div>
                    <a href="{{ $event->reference_link }}" target="_blank" 
                       class="text-blue-600 hover:text-blue-800 ml-6 break-all">
                        {{ $event->reference_link }}
                    </a>
                </div>
            @endif

            <!-- Metadata -->
            <div class="flex justify-between items-center pt-4 border-t border-gray-200">
                <div class="text-xs text-gray-500">
                    <p>Published: {{ \Carbon\Carbon::parse($event->updated_at)->format('M j, Y g:i A') }}</p>
                    @if ($event->approved_by)
                        <p>Approved by Admin ID: {{ $event->approved_by }}</p>
                    @endif
                </div>
                
                <div class="flex items-center space-x-2">
                    <span class="text-xs text-gray-500">
                        Saves: {{ \App\Models\SavedEvent::where('event_id', $event->id)->count() }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>