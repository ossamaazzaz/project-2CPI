<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Register')); ?></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>
                        <!-- Make sure to make this more dynamic, refactor it later -->
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control<?php echo e($errors->has('username') ? ' is-invalid' : ''); ?>" name="username" value="<?php echo e(old('username')); ?>" required autofocus>

                                <?php if($errors->has('username')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('username')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="firstName" class="col-md-4 col-form-label text-md-right">First  Name</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control<?php echo e($errors->has('firstName') ? ' is-invalid' : ''); ?>" name="firstName" value="<?php echo e(old('firstName')); ?>" required autofocus>

                                <?php if($errors->has('firstName')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('firstName')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">Last  Name</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control<?php echo e($errors->has('lastName') ? ' is-invalid' : ''); ?>" name="lastName" value="<?php echo e(old('lastName')); ?>" required autofocus>

                                <?php if($errors->has('lastName')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('lastName')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="phoneNum" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phoneNum" type="text" class="form-control<?php echo e($errors->has('phoneNum') ? ' is-invalid' : ''); ?>" name="phoneNum" value="<?php echo e(old('phoneNum')); ?>" required autofocus>

                                <?php if($errors->has('phoneNum')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('phoneNum')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="adr" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="adr" type="text" class="form-control<?php echo e($errors->has('adr') ? ' is-invalid' : ''); ?>" name="adr" value="<?php echo e(old('adr')); ?>" required autofocus>

                                <?php if($errors->has('adr')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('adr')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="idCard" class="col-md-4 col-form-label text-md-right">Identity Card Number</label>

                            <div class="col-md-6">
                                <input id="idCard" type="text" class="form-control<?php echo e($errors->has('idCard') ? ' is-invalid' : ''); ?>" name="idCard" value="<?php echo e(old('idCard')); ?>" required autofocus>

                                <?php if($errors->has('idCard')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('idCard')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Register')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>