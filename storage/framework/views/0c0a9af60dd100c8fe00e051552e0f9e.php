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
                <span
                    class="bg-yellow-400 text-black text-[10px] font-bold px-2 py-0.5 rounded-full uppercase whitespace-nowrap">
                    <?php echo e($eventRequest->approval_status); ?>

                </span>
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

                <div>
                    <strong class="text-gray-100 block">👤 Requester:</strong>
                    <ul class="mt-0.5">
                        <li>
                            <a href="mailto:<?php echo e($eventRequest->requester_email); ?>"
                                class="text-blue-400 hover:underline">
                                <?php echo e($eventRequest->requester_email); ?>

                            </a>
                        </li>
                        <?php if($eventRequest->requester_phone): ?>
                            <li>
                                <a href="tel:<?php echo e($eventRequest->requester_phone); ?>"
                                    class="text-blue-400 hover:underline">
                                    <?php echo e($eventRequest->requester_phone); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
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

            <!-- Actions -->
            <div class="flex justify-end space-x-2 pt-3 border-t border-white/10 mt-4">
                <a href="<?php echo e(route('admin.dashboard.events.requests.edit', ['id' => $eventRequest->id])); ?>"
                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-3 py-1.5 rounded-md transition cursor-pointer hover:cursor-pointer flex items-center">
                    Edit
                </a>
                <form method="POST"
                    action="<?php echo e(route('admin.dashboard.events.requests.reject', ['id' => $eventRequest->id])); ?>"
                    onsubmit="return confirm('Are you sure you want to reject and delete this request?');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white text-sm px-3 py-1.5 rounded-md transition cursor-pointer hover:cursor-pointer">
                        Reject
                    </button>
                </form>
                <form method="POST"
                    action="<?php echo e(route('admin.dashboard.events.requests.approve', ['id' => $eventRequest->id])); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white text-sm px-3 py-1.5 rounded-md transition cursor-pointer hover:cursor-pointer">
                        Approve
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/resources/views/components/admin/event-request-card.blade.php ENDPATH**/ ?>