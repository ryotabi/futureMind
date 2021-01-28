<?php $__env->startSection('content'); ?>
    <main>
        <div class="user_wrap">
            <div class="container">
                <form action="<?php echo e(route('user.update')); ?>" enctype="multipart/form-data" method="POST">
                <?php echo csrf_field(); ?>
                    <div class="row row_wrap">
                        <div class="col-md-3 info_wrap">
                            <div class="info_title border_future">
                                <p><label for="industry">志望業界</label></p>
                                <?php if($errors->has('industry')): ?>
                                <p class="error-text"><?php echo e($errors->first('industry')); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="info_content">
                                <select id="industry" name="industry" >
                                    <option value="<?php echo e($items->industry); ?>" selected><?php echo e($items->industry); ?></option>
                                    <?php $__currentLoopData = $optionIndustry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $industry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($industry); ?>" ><?php echo e($industry); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 info_wrap">
                            <div class="info_title border_future">
                                <p><label for="name">氏名</label></p>
                                <?php if($errors->has('name')): ?>
                                <p class="error-text"><?php echo e($errors->first('name')); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="info_content">
                                <p><input type="text" id="name" name="name" value="<?php echo e($items->name); ?>"></p>
                            </div>
                        </div>
                        <div class="col-md-3 info_wrap">
                            <div class="info_title border_future">
                                <p><label for="year">卒業年度</label></p>
                                <?php if($errors->has('year')): ?>
                                <p class="error-text"><?php echo e($errors->first('year')); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="info_content">
                                <select id="year" name="year" >
                                    <option value="<?php echo e($items->year); ?>" selected><?php echo e($items->year); ?></option>
                                    <?php $__currentLoopData = $optionYear; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($year); ?>" ><?php echo e($year); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="row row_wrap">
                        <div class="col-md-3 info_wrap">
                            <div class="info_title border_future">
                                <p><label for="club">部活動・サークル</label></p>
                            </div>
                            <div class="info_content">
                                <p><input type="text" id="club" name="club" value="<?php echo e($items->club); ?>"></p>
                            </div>
                        </div>
                        <div class="col-md-3 info_wrap">
                            <div >
                                <img class="info_img" src="/storage/images/<?php echo e($items->img_name); ?>" alt="画像">
                            </div>
                            <input type="file" name="img_name" value="<?php echo e($items->img_name); ?>">
                            <input type="submit" value="更新" class="toEdit_btn">
                        </div>
                        <div class="col-md-3 info_wrap text-center">
                            <div class="info_title border_self">
                                <p><label for="university">在学学校</label></p>
                                <?php if($errors->has('university')): ?>
                                <p class="error-text"><?php echo e($errors->first('university')); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="info_content">
                                <p><input type="text" id="university" name="university" value="<?php echo e($items->university); ?>"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row row_wrap">
                        <div class="col-md-3 info_wrap">
                            <div class="info_title border_self">
                                <p><label for="hobby">趣味</label></p>
                                <?php if($errors->has('hobby')): ?>
                                <p class="error-text"><?php echo e($errors->first('hobby')); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="info_content">
                                <p><input type="text" id="hobby" name="hobby" value="<?php echo e($items->hobby); ?>"></p>
                            </div>
                        </div>
                        <div class="col-md-3 info_wrap">
                            <div class="info_title border_self">
                                <p><label for="hometown">出身</label></p>
                                <?php if($errors->has('hometown')): ?>
                                <p class="error-text"><?php echo e($errors->first('hometown')); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="info_content">
                                <select id="hometown" name="hometown" >
                                    <option value="<?php echo e($items->hometown); ?>" selected><?php echo e($items->hometown); ?></option>
                                    <?php $__currentLoopData = $optionPrefecture; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hometown): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($hometown); ?>" ><?php echo e($hometown); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 info_wrap">
                            <div class="info_title border_self">
                                <p><label for="email">メールアドレス</label></p>
                                <?php if($errors->has('email')): ?>
                                <p class="error-text"><?php echo e($errors->first('email')); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="info_content">
                                <p><input type="email" id="email" name="email" value="<?php echo e($items->email); ?>"></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\futureMind\resources\views/user/edit.blade.php ENDPATH**/ ?>