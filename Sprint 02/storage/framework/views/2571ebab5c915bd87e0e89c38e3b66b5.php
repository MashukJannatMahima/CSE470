<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('My Rides')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            
            <div class="mb-4">
                <a href="<?php echo e(route('rides.create')); ?>" class="bg-green-500 text-white px-4 py-2 rounded">
                    + Add New Ride
                </a>
            </div>

            
            <div class="bg-white p-6 shadow rounded">
                <h3 class="text-lg font-bold mb-4">Upcoming Rides</h3>
                <?php $__empty_1 = true; $__currentLoopData = $upcoming; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ride): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="border p-4 mb-3">
                        <p><strong>To:</strong> <?php echo e($ride->destination); ?></p>
                        <p><strong>Time:</strong> <?php echo e($ride->ride_time->format('d M Y, h:i A')); ?></p>
                        <p><strong>Details:</strong> <?php echo e($ride->details); ?></p>

                        <?php if(!$ride->is_cancelled): ?>
                            <form 
                                action="<?php echo e(route('rides.cancel', $ride)); ?>" 
                                method="POST" 
                                class="mt-2" 
                                onsubmit="return confirm('Are you sure you want to cancel this ride?');"
                            >
                                <?php echo csrf_field(); ?>
                                <button class="bg-red-500 text-white px-4 py-1 rounded">Cancel Ride</button>
                            </form>
                        <?php else: ?>
                            <p class="text-red-500 mt-2">Cancelled</p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>No upcoming rides.</p>
                <?php endif; ?>
            </div>

            
            <div class="bg-white p-6 shadow rounded">
                <h3 class="text-lg font-bold mb-4">Past Rides</h3>
                <?php $__empty_1 = true; $__currentLoopData = $past; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ride): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="border p-4 mb-3">
                        <p><strong>To:</strong> <?php echo e($ride->destination); ?></p>
                        <p><strong>Time:</strong> <?php echo e($ride->ride_time->format('d M Y, h:i A')); ?></p>
                        <p><strong>Details:</strong> <?php echo e($ride->details); ?></p>

                        <?php if($ride->is_cancelled): ?>
                            <p class="text-red-500">Cancelled</p>
                        <?php endif; ?>

                        
                        <?php if(!$ride->is_cancelled && $ride->reviews->where('user_id', auth()->id())->isEmpty()): ?>
                            <form action="<?php echo e(route('rides.review', $ride)); ?>" method="POST" class="mt-3">
                                <?php echo csrf_field(); ?>
                                <label class="block mb-1 font-semibold">Rate this ride:</label>
                                <select name="rating" class="border rounded px-2 py-1 mb-2" required>
                                    <option value="">Select Rating</option>
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?> Star<?php echo e($i > 1 ? 's' : ''); ?></option>
                                    <?php endfor; ?>
                                </select>

                                <textarea name="comment" rows="2" class="w-full border px-2 py-1 rounded mb-2" placeholder="Optional comment..."></textarea>

                                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Submit Review</button>
                            </form>
                        <?php endif; ?>

                        
                        <?php if($ride->reviews->isNotEmpty()): ?>
                            <div class="mt-3">
                                <h4 class="font-bold mb-1">Reviews:</h4>
                                <?php $__currentLoopData = $ride->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="border-t pt-2 mt-2">
                                        <p><strong><?php echo e($review->user->name); ?></strong> rated: <?php echo e($review->rating); ?>/5</p>
                                        <?php if($review->comment): ?>
                                            <p><?php echo e($review->comment); ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>No past rides.</p>
                <?php endif; ?>
            </div>

        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\User\ride-app\resources\views/rides/index.blade.php ENDPATH**/ ?>