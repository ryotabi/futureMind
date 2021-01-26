<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>futureMind</title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
</head>
<body>
    <main class="login_wrap">
        <div class="bg_line top self_color"></div>
        <div class="bg_line center self_color"></div>
        <div class="bg_line bottom self_color"></div>
        <h1 class="login_title text-center">futureMind</h1>
        <div class="login_form_wrap">
            <form action="<?php echo e(route('login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="exampleInputPassword1">メールアドレス</label>
                    <?php if($errors->has('email')): ?>
                    <p class="error-text"><?php echo e($errors->first('email')); ?></p>
                    <?php endif; ?>
                    <input type="email" class="form-control" id="exampleInputPassword1" name="email" placeholder="test@test.com" value="<?php echo e(old('email')); ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">パスワード</label>
                    <?php if($errors->has('password')): ?>
                    <p class="error-text"><?php echo e($errors->first('password')); ?></p>
                    <?php endif; ?>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="*********">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">ログイン</button>
                </div>
                <div class="text-center" style="margin-top:10px;">
                    <a href="<?php echo e(route('register')); ?>" class="mt-10">新規登録</a>
                </div>
            </form>
        </div>
    </main>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\futureMind\resources\views/auth/login.blade.php ENDPATH**/ ?>