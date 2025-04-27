<nav aria-label="Pagination" class="flex justify-center space-x-2">
    <?php if($paginator->onFirstPage()): ?>
        <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-lg cursor-not-allowed">Previous</span>
    <?php else: ?>
        <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition">Previous</a>
    <?php endif; ?>

    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(is_string($element)): ?>
            <span class="px-4 py-2 text-gray-400"><?php echo e($element); ?></span>
        <?php endif; ?>
        <?php if(is_array($element)): ?>
            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($page == $paginator->currentPage()): ?>
                    <span class="px-4 py-2 text-white bg-indigo-800 rounded-lg"><?php echo e($page); ?></span>
                <?php else: ?>
                    <a href="<?php echo e($url); ?>" class="px-4 py-2 text-indigo-600 bg-indigo-100 rounded-lg hover:bg-indigo-200"><?php echo e($page); ?></a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($paginator->hasMorePages()): ?>
        <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition">Next</a>
    <?php else: ?>
        <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-lg cursor-not-allowed">Next</span>
    <?php endif; ?>
</nav>
<?php /**PATH C:\Users\Enkel\Desktop\webapp-upBizz\resources\views/vendor/pagination/tailwind.blade.php ENDPATH**/ ?>