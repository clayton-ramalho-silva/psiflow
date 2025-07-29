<div class="col-9 bloco-ativo d-flex mb-3">
    <h5>Status</h5>
    
    <form id="statusForm" action="<?php echo e(route($route, $id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        
        <input type="hidden" name="status" id="statusInput" value="<?php echo e($status); ?>">
        
        <div class="btn-group">
            <!-- Botão principal -->
            <button type="button" class="btn status-<?php echo e($status); ?>">
                <?php echo e(ucfirst($status)); ?>

            </button>
            
            <!-- Botão dropdown -->
            <button type="button" class="btn status-<?php echo e($status); ?> dropdown-toggle dropdown-toggle-split" 
                data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
                <svg style="width: 13px;<?php echo e($status == 'processo' ? 'fill:#000' : 'fill:#fff'); ?>" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 386.257 386.257" style="enable-background:new 0 0 386.257 386.257;" xml:space="preserve">
                    <polygon points="0,96.879 193.129,289.379 386.257,96.879 "></polygon>
                </svg>
            </button>
            
            <!-- Itens do dropdown -->
            <ul class="dropdown-menu">
                <?php $__currentLoopData = $statusOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a class="dropdown-item <?php if($status == $value): ?> active status-<?php echo e($value); ?> <?php endif; ?>" 
                           href="#" onclick="updateStatus('<?php echo e($value); ?>')">
                           <?php echo e($label); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </form>
</div>

<script>
    function updateStatus(newStatus) {
        document.getElementById('statusInput').value = newStatus;
        document.getElementById('statusForm').submit();
    }
</script>

<style>
    
.status-ativo,
.status-ativo:hover{
color: #fff;    
background-color: gray !important;
}

.status-ativo.dropdown-toggle-split:hover{
color: #fff;    
background-color: rgb(94, 94, 94) !important;
}



.status-processo,
.status-processo:hover {
    color: #000; 
background-color: yellow !important;
}
.status-processo.dropdown-toggle-split:hover{
color: #fff;    
background-color: rgb(228, 228, 0) !important;
}

.status-contratado,
.status-contratado:hover{
    color: #fff; 
background-color: green !important;
}

.status-contratado.dropdown-toggle-split:hover{
color: #fff;    
background-color: rgb(0, 105, 0) !important;
}


.status-inativo,
.status-inativo:hover{
    color: #fff; 
    background-color: red !important;
}

.status-contratado.dropdown-toggle-split:hover{
color: #fff;    
background-color: rgb(225, 0, 0) !important;
}


.dropdown-menu.show{
    z-index: 9999;
}
</style><?php /**PATH /home1/flav6095/painelasppe.com.br/resources/views/components/status-button.blade.php ENDPATH**/ ?>