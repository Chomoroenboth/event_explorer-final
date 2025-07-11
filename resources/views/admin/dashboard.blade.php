@extends('layouts.app_admin')

@section('page-title', 'Event Requests')
@section('page-description', 'Review and manage pending event submissions')

@section('content')
<div class="fade-in">
    <!-- Enhanced Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-white transform hover:-translate-y-1 relative overflow-hidden">
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <h3 class="text-3xl font-bold">{{ $eventRequests->count() }}</h3>
                    <p class="text-blue-100 text-sm font-medium">Pending Requests</p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v16a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center relative z-10">
                <div class="w-full bg-white/20 rounded-full h-2">
                    <div class="bg-white h-2 rounded-full transition-all duration-1000" style="width: 75%"></div>
                </div>
            </div>
            <!-- Animated background elements -->
            <div class="absolute top-0 right-0 w-20 h-20 bg-white/5 rounded-full -translate-y-10 translate-x-10"></div>
            <div class="absolute bottom-0 left-0 w-16 h-16 bg-white/5 rounded-full translate-y-8 -translate-x-8"></div>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-white transform hover:-translate-y-1 relative overflow-hidden">
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <h3 class="text-3xl font-bold">{{ \App\Models\EventRequest::where('approval_status', 'approved')->count() }}</h3>
                    <p class="text-green-100 text-sm font-medium">Approved Events</p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center relative z-10">
                <div class="w-full bg-white/20 rounded-full h-2">
                    <div class="bg-white h-2 rounded-full transition-all duration-1000" style="width: 88%"></div>
                </div>
            </div>
            <!-- Success indicator -->
            <div class="absolute top-4 right-4">
                <div class="w-3 h-3 bg-green-300 rounded-full animate-pulse"></div>
            </div>
            <!-- Animated background elements -->
            <div class="absolute top-0 right-0 w-20 h-20 bg-white/5 rounded-full -translate-y-10 translate-x-10"></div>
            <div class="absolute bottom-0 left-0 w-16 h-16 bg-white/5 rounded-full translate-y-8 -translate-x-8"></div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-white transform hover:-translate-y-1 relative overflow-hidden">
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <h3 class="text-3xl font-bold">{{ \App\Models\User::count() }}</h3>
                    <p class="text-purple-100 text-sm font-medium">Total Users</p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center relative z-10">
                <div class="w-full bg-white/20 rounded-full h-2">
                    <div class="bg-white h-2 rounded-full transition-all duration-1000" style="width: 95%"></div>
                </div>
            </div>
            <!-- Animated background elements -->
            <div class="absolute top-0 right-0 w-20 h-20 bg-white/5 rounded-full -translate-y-10 translate-x-10"></div>
            <div class="absolute bottom-0 left-0 w-16 h-16 bg-white/5 rounded-full translate-y-8 -translate-x-8"></div>
        </div>
    </div>
    <!-- Alerts -->
    @if (session('success'))
    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6 slide-in-right" role="alert">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            {{ session('success') }}
        </div>
    </div>
    @endif

    @if (session('error'))
    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-6 slide-in-right" role="alert">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            {{ session('error') }}
        </div>
    </div>
    @endif

    <!-- Enhanced Event Requests Container -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-5 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-gray-900 flex items-center">
                        <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        Pending Event Requests
                    </h2>
                    <p class="text-sm text-gray-600 mt-1">Review and approve submitted events</p>
                </div>
                <div class="flex items-center space-x-3">
                    @if($eventRequests->count() > 0)
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-orange-100 text-orange-800">
                        {{ $eventRequests->count() }} pending
                    </span>
                    @endif
                    <div class="w-3 h-3 bg-orange-400 rounded-full animate-pulse"></div>
                </div>
            </div>
        </div>

        <div class="divide-y divide-gray-100">
            @forelse ($eventRequests as $eq)
            <div class="p-6 hover:bg-gray-50/50 transition-colors duration-200">
                <x-admin.event-request-card :eventRequest="$eq" />
            </div>
            @empty
            <div class="p-12 text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v16a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">All caught up! 🎉</h3>
                <p class="text-gray-500 max-w-md mx-auto">There are no pending event requests at the moment. New submissions will appear here for your review.</p>
                <div class="mt-6">
                    <a href="{{ route('admin.events') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        View Published Events
                    </a>
                </div>
            </div>
            @endforelse
        </div>
    </div>
    @endsection