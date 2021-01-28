<?php $__env->startSection('content'); ?>
<main>
        <?php if(isset($chartCompanyData[0])): ?>
        <span id="js_company_developmentValue" data-companydevelopmentvalue="<?php echo e($chartCompanyData[0]); ?>"></span>
        <span id="js_company_socialValue" data-companysocialvalue="<?php echo e($chartCompanyData[1]); ?>"></span>
        <span id="js_company_stableValue" data-companystablevalue="<?php echo e($chartCompanyData[2]); ?>"></span>
        <span id="js_company_teammateValue" data-companyteammatevalue="<?php echo e($chartCompanyData[3]); ?>"></span>
        <span id="js_company_futureValue" data-companyfuturevalue="<?php echo e($chartCompanyData[4]); ?>"></span>
        <?php endif; ?>
        <div class="singleCompany_wrap">
            <div class="companyProfile_title">プロフィール編集</div>
            <div class="singleCompany_content mt-0">
                <div class="container">
                    <div class="row">
                        <div class="company_chart col-md-6">
                            <canvas id="companyChart" width="60%" height="40%"></canvas>
                        </div>
                        <div class="col-md-6  company_details">
                            <form action="<?php echo e(route('company.update')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                                <div class="text-center">
                                    <img class="company_logo company_admin" src="/storage/images/<?php echo e($items->company_icon); ?>" alt="">
                                </div>
                                <div class="text-center mb-10"><input type="file" name="company_icon"></div>
                                <div class="company_info company_edit">
                                    <ul>
                                        <li><label for="company">企業名</label>：<input type="text" id="company" name="name" value="<?php echo e($items->name); ?>"></li>
                                        <?php if($errors->has('name')): ?>
                                        <p class="error-text" style="margin-top: -10px"><?php echo e($errors->first('name')); ?></p>
                                        <?php endif; ?>
                                        <li><label for="industry">業界</label>：
                                            <select id="industry" name="industry" >
                                                <option value="<?php echo e($items->industry); ?>" selected><?php echo e($items->industry); ?></option>
                                                <?php $__currentLoopData = $optionIndustry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $industry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($industry); ?>" ><?php echo e($industry); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </li>
                                        <?php if($errors->has('industry')): ?>
                                        <p class="error-text" style="margin-top: -10px"><?php echo e($errors->first('industry')); ?></p>
                                        <?php endif; ?>
                                        <li><label for="office">場所</label>：<input type="text" id="office" name="office" value="<?php echo e($items->office); ?>"></li>
                                        <?php if($errors->has('office')): ?>
                                        <p class="error-text" style="margin-top: -10px"><?php echo e($errors->first('office')); ?></p>
                                        <?php endif; ?>
                                        <li><label for="employee">社員数</label>：約<input type="text" id="employee" name="employee" value="<?php echo e($items->employee); ?>">人</li>
                                        <?php if($errors->has('employee')): ?>
                                        <p class="error-text" style="margin-top: -10px"><?php echo e($errors->first('employee')); ?></p>
                                        <?php endif; ?>
                                        <li><label for="homepage">ホームページ</label>：<input type="text" id="homepage" name="homepage" value="<?php echo e($items->homepage); ?>"></li>
                                        <?php if($errors->has('homepage')): ?>
                                        <p class="error-text" style="margin-top: -10px"><?php echo e($errors->first('homepage')); ?></p>
                                        <?php endif; ?>
                                        <li><label for="comment">企業からのコメント</label><br>
                                            <textarea type="text" id="comment" name="comment" style="width:100%;"><?php echo e($items->comment); ?></textarea>
                                        </li> 
                                        <?php if($errors->has('comment')): ?>
                                        <p class="error-text" style="margin-top: -10px"><?php echo e($errors->first('comment')); ?></p>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="toEdit_btn">更新</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.company_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\futureMind\resources\views/Company/edit.blade.php ENDPATH**/ ?>