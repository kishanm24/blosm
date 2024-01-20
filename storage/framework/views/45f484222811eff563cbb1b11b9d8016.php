<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.horizontal'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Layouts <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Horizontal <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
   
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts-horizontal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/kishanmehta/home/laravel/blosm/resources/views/layouts-horizontal.blade.php ENDPATH**/ ?>