<?php $__env->startSection('content'); ?>
    <main>
        <div class="chat_wrap">
            <div class="container">
            <h3 class="chat_title">チャット</h3>
                <div class="row">
                    <div class="col-md-3">
                        <div class="text-center chat_user">
                            <p class="chat_name"><?php echo e($company_user->name); ?></p>
                            <img class="chat_img" src="/storage/images/<?php echo e($company_user->company_icon); ?>" alt="画像">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="message_wrap message_wrap_student">
                            <?php if(isset($messages)): ?>
                            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($message->student_user !== 0): ?>
                            <div class="text-right">
                                <div class="balloon1-right">
                                    <p><?php echo e($message->message); ?></p>
                                </div>
                            </div>
                            <?php elseif($message->student_user === 0): ?>
                            <div>
                                <div class="balloon1-left">
                                    <p><?php echo e($message->message); ?></p>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-3 auth_profile">
                        <div class="text-center chat_user">
                            <p class="chat_name">あなた</p>
                            <img class="chat_img" src="/storage/images/<?php echo e($student_user->img_name); ?>" alt="画像">
                        </div>
                    </div>
                </div>
                <form action="<?php echo e(route('user.postMessage',['id'=>$room_id])); ?>" method="POST" class="chat_form_wrap ">
                    <?php echo csrf_field(); ?>
                    <div class="input-group mb-3 chat_form">
                        <input type="text" class="form-control chat_input" name="message" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append chat_btn_wrap">
                            <button class="btn btn-outline-secondary chat_btn" type="submit" >送信</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\futureMind\resources\views/user/chat.blade.php ENDPATH**/ ?>