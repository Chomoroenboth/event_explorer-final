<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['eventRequest' => \App\Models\EventRequest::class]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['eventRequest' => \App\Models\EventRequest::class]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $imageUrl = $eventRequest->image ? asset('storage/' . $eventRequest->image) : asset('placeholder.svg');
?>

<div class="bg-black/60 border border-white/10 rounded-xl shadow-lg overflow-hidden mb-6 max-w-3xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-[150px_1fr] gap-4">
        <!-- Image -->
        <div class="h-[150px] md:h-full w-full bg-gray-900 flex items-center justify-center">
            <img src="<?php echo e($imageUrl); ?>" alt="Event Image" class="w-full h-full object-cover" />
        </div>

        <!-- Content -->
        <div class="p-4 space-y-3 text-gray-200">
            <!-- Header -->
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-lg font-bold text-white truncate"><?php echo e($eventRequest->title); ?></h3>
                    <p class="text-xs text-gray-400">📍 <?php echo e($eventRequest->location); ?></p>
                </div>
            </div>

            <!-- Description -->
            <p class="text-sm text-gray-300 line-clamp-3">
                <?php echo e($eventRequest->description); ?>

            </p>

            <!-- Details -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm text-gray-300">
                <div>
                    <strong class="text-gray-100 block">🗓 Date & Time:</strong>
                    <span class="block mt-0.5">
                        <?php echo e(\Carbon\Carbon::parse($eventRequest->start_datetime)->format('D, M j, Y, g:i A')); ?>

                        -
                        <?php echo e(\Carbon\Carbon::parse($eventRequest->end_datetime)->format('D, M j, Y, g:i A')); ?>

                    </span>
                </div>

                <div>
                    <strong class="text-gray-100 block">📌 Type & Area & Category:</strong>
                    <span class="block mt-0.5">
                        <?php echo e($eventRequest->event_type); ?> @ <?php echo e($eventRequest->area); ?> @ <?php echo e($eventRequest->category); ?>

                    </span>
                </div>

                <div>
                    <strong class="text-gray-100 block">💲 Fee:</strong>
                    <span class="block mt-0.5">
                        <?php echo e($eventRequest->is_free ? 'Free Entry' : '$' . number_format($eventRequest->price, 2)); ?>

                    </span>
                </div>

                <?php if($eventRequest->reference_link): ?>
                    <div class="col-span-full">
                        <strong class="text-gray-100 block">🔗 Reference:</strong>
                        <a href="<?php echo e($eventRequest->reference_link); ?>" target="_blank"
                            class="text-blue-400 hover:underline break-words">
                            <?php echo e($eventRequest->reference_link); ?>

                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Save Button -->
            <?php
                $isSaved =
                    auth('web')->check() &&
                    \App\Models\SavedEvent::where('user_id', auth('web')->id())
                        ->where('event_id', $eventRequest->id)
                        ->exists();
            ?>
            <div class="flex justify-end pt-3 border-t border-white/10 mt-4">
                <form method="POST" action="<?php echo e(route('events.save', ['id' => $eventRequest->id])); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                        class="flex items-center gap-2 <?php echo e($isSaved ? 'bg-gray-700' : 'bg-pink-600 hover:bg-pink-700'); ?> text-white text-sm px-4 py-2 rounded-md transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                            <?php if($isSaved): ?>
                                <!-- Filled Heart -->
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2
                                    6.5 3.5 5 5.5 5c1.54 0 3.04.99
                                    3.57 2.36h1.87C13.46 5.99 14.96
                                    5 16.5 5 18.5 5 20 6.5 20
                                    8.5c0 3.78-3.4 6.86-8.55
                                    11.54L12 21.35z" />
                            <?php else: ?>
                                <!-- Outline Heart -->
                                <path
                                    d="M16.5 3c-1.74 0-3.41 1.01-4.5 2.09C10.91 4.01 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54a1 1 0 0 0 1.3 0C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3zm-4.4 15.55C7.14 14.24 4 11.39 4 8.5 4 6.5 5.5 5 7.5 5c1.54 0 3.04.99 3.57 2.36h1.87C13.46 5.99 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.89-3.14 5.74-7.9 10.05z" />
                            <?php endif; ?>
                        </svg>
                        <?php echo e($isSaved ? 'Saved' : 'Save Event'); ?>

                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/resources/views/components/event-card.blade.php ENDPATH**/ ?>