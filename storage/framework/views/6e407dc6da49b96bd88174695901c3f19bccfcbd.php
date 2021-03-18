<?php $__env->startSection('content'); ?>
    <main>
    <span id="js_company_developmentValue" data-companydevelopmentvalue="<?php echo e($company->diagnosis->developmentvalue); ?>"></span>
        <span id="js_company_socialValue" data-companysocialvalue="<?php echo e($company->diagnosis->socialvalue); ?>"></span>
        <span id="js_company_stableValue" data-companystablevalue="<?php echo e($company->diagnosis->stablevalue); ?>"></span>
        <span id="js_company_teammateValue" data-companyteammatevalue="<?php echo e($company->diagnosis->teammatevalue); ?>"></span>
        <span id="js_company_futureValue" data-companyfuturevalue="<?php echo e($company->diagnosis->futurevalue); ?>"></span>
        <div class="singleCompany_wrap">
            <div class="singleCompany_title primary_color"><?php echo e($company->name); ?></div>
            <div class="singleCompany_content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 company_chart">
                            <canvas id="companyChart" width="60%" height="40%"></canvas>
                        </div>
                        <div class="col-xl-6 company_details">
                            <div class="text-center"><img class="company_logo" src="http://s-ryota.sakura.ne.jp/futureMind/storage/images/<?php echo e($company->company_icon); ?>" alt=""></div>
                            <div class="company_info">
                                <ul>
                                    <li>企業:<?php echo e($company->name); ?></li>
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
                    </div>
                    <?php if($isLiked === false): ?>
                    <form method="POST" action="<?php echo e(route('search.likeCompany',['id'=>$company->id])); ?>" class="likes_btn_wrap text-center">
                    <?php echo csrf_field(); ?>
                        <input type="hidden" name="company_id" value="<?php echo e($company->id); ?>"/>
                        <button type="submit" class="likes_btn future_btn"><span>お気に入りに追加</span></button>
                    </form>
                    <?php else: ?>
                    <div  class="likes_btn_wrap text-center">
                        <?php if($chat == true): ?>
                        <p type="submit" class="likes_btn future_btn"><a href="<?php echo e(route('user.chat',['id'=>$room_id])); ?>">チャット</a></p>
                        <?php else: ?>
                        <p type="submit" class="likes_btn liked_btn"><span>お気に入りに追加済み</span></p>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
    <script src="<?php echo e(asset('js/companyChart.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.company_single', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\futureMind\resources\views/companySearch/single.blade.php ENDPATH**/ ?>