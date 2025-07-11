@props(['eventRequest' => \App\Models\EventRequest::class])

@php
    $imageUrl = $eventRequest->image ? asset('storage/' . $eventRequest->image) : asset('placeholder.svg');
@endphp

<div class="bg-black/60 border border-white/10 rounded-xl shadow-lg overflow-hidden mb-6 max-w-3xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-[150px_1fr] gap-4">
        <!-- Image -->
        <div class="h-[150px] md:h-full w-full bg-gray-900 flex items-center justify-center">
            <img src="{{ $imageUrl }}" alt="Event Image" class="w-full h-full object-cover" />
        </div>

        <!-- Content -->
        <div class="p-4 space-y-3 text-gray-200">
            <!-- Header -->
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-lg font-bold text-white truncate">{{ $eventRequest->title }}</h3>
                    <p class="text-xs text-gray-400">📍 {{ $eventRequest->location }}</p>
                </div>
                <span
                    class="bg-yellow-400 text-black text-[10px] font-bold px-2 py-0.5 rounded-full uppercase whitespace-nowrap">
                    {{ $eventRequest->approval_status }}
                </span>
            </div>

            <!-- Description -->
            <p class="text-sm text-gray-300 line-clamp-3">
                {{ $eventRequest->description }}
            </p>

            <!-- Details -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm text-gray-300">
                <div>
                    <strong class="text-gray-100 block">🗓 Date & Time:</strong>
                    <span class="block mt-0.5">
                        {{ \Carbon\Carbon::parse($eventRequest->start_datetime)->format('D, M j, Y, g:i A') }}
                        -
                        {{ \Carbon\Carbon::parse($eventRequest->end_datetime)->format('D, M j, Y, g:i A') }}
                    </span>
                </div>

                <div>
                    <strong class="text-gray-100 block">📌 Type & Area & Category:</strong>
                    <span class="block mt-0.5">
                        {{ $eventRequest->event_type }} @ {{ $eventRequest->area }} @ {{ $eventRequest->category }}
                    </span>
                </div>

                <div>
                    <strong class="text-gray-100 block">💲 Fee:</strong>
                    <span class="block mt-0.5">
                        {{ $eventRequest->is_free ? 'Free Entry' : '$' . number_format($eventRequest->price, 2) }}
                    </span>
                </div>

                <div>
                    <strong class="text-gray-100 block">👤 Requester:</strong>
                    <ul class="mt-0.5">
                        <li>
                            <a href="mailto:{{ $eventRequest->requester_email }}"
                                class="text-blue-400 hover:underline">
                                {{ $eventRequest->requester_email }}
                            </a>
                        </li>
                        @if ($eventRequest->requester_phone)
                            <li>
                                <a href="tel:{{ $eventRequest->requester_phone }}"
                                    class="text-blue-400 hover:underline">
                                    {{ $eventRequest->requester_phone }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>

                @if ($eventRequest->reference_link)
                    <div class="col-span-full">
                        <strong class="text-gray-100 block">🔗 Reference:</strong>
                        <a href="{{ $eventRequest->reference_link }}" target="_blank"
                            class="text-blue-400 hover:underline break-words">
                            {{ $eventRequest->reference_link }}
                        </a>
                    </div>
                @endif
            </div>

            <!-- Actions -->
            <div class="flex justify-end space-x-2 pt-3 border-t border-white/10 mt-4">
                <a href="{{ route('admin.dashboard.events.requests.edit', ['id' => $eventRequest->id]) }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-3 py-1.5 rounded-md transition cursor-pointer hover:cursor-pointer flex items-center">
                    Edit
                </a>
                <form method="POST"
                    action="{{ route('admin.dashboard.events.requests.reject', ['id' => $eventRequest->id]) }}"
                    onsubmit="return confirm('Are you sure you want to reject and delete this request?');">
                    @csrf
                    @method('PATCH')
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white text-sm px-3 py-1.5 rounded-md transition cursor-pointer hover:cursor-pointer">
                        Reject
                    </button>
                </form>
                <form method="POST"
                    action="{{ route('admin.dashboard.events.requests.approve', ['id' => $eventRequest->id]) }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white text-sm px-3 py-1.5 rounded-md transition cursor-pointer hover:cursor-pointer">
                        Approve
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
