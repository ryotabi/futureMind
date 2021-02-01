<?php $__env->startSection('content'); ?>
    <main>
        <div class="singleCompany_wrap">
            <div class="singleCompany_title self_color"><?php echo e($company->name); ?></div>
            <div class="singleCompany_content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 order-md-2  company_details">
                            <div class="text-center"><img class="company_logo self_logo" src="/storage/images/<?php echo e($company->company_icon); ?>" alt=""></div>
                            <div class="company_info">
                                <ul>
                                    <li>企業名：<?php echo e($company->name); ?></li>
                                    <li>業界：<?php echo e($company->industry); ?></li>
                                    <li>場所：<?php echo e($company->office); ?></li>
                                    <li>社員数：<?php echo e($company->employee); ?>人</li>
                                    <li>ホームページ：<?php echo e($company->homepage); ?></li>
                                    <li>企業からのコメント<br>
                                        <?php echo e($company->comment); ?>

                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-6 order-md-1 singleCompany_analysis">
                            <div class="analysis_title self_color">あなたに物足りない点</div>
                            <div class="analysis_content">
                                <ul>
                                    <li>〇<?php echo e($companyValue->comment_type); ?><br>
                                        <?php echo e($companyValue->comment); ?>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php if($isLiked === false): ?>
                    <form method="POST" action="<?php echo e(route('diagnosis.selfLikeCompany',['id'=>$company->id])); ?>" class="likes_btn_wrap text-center">
                    <?php echo csrf_field(); ?>
                        <input type="hidden" name="company_id" value="<?php echo e($company->id); ?>"/>
                        <button type="submit" class="likes_btn future_btn"><span>お気に入りに追加</span></button>
                    </form>
                    <?php else: ?>
                    <div  class="likes_btn_wrap text-center">
                        <p type="submit" class="likes_btn liked_btn"><span>お気に入りに追加済み</span></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\futureMind\resources\views/diagnosis/selfSingleCompany.blade.php ENDPATH**/ ?>