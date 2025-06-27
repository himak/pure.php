<?php declare(strict_types=1); ?>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Meno</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('contacts._partials.table-row', ['contact' => $contact], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH /Users/himak/code/pure.php/resources/views/contacts/_partials/table.blade.php ENDPATH**/ ?>