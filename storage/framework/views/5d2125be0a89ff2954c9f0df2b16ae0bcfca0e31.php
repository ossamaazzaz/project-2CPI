<br>
<div class="card" style="margin: 10px;">
                <div class="card-title">
                    <h2 style="text-align: center;">Pending users</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="usersDataTable" class="table">
                            <thead>
                                <tr>
                                    <th>pic</th>
                                    <th>username</th>
                                    <th>nom</th>
                                    <th>prénom</th>
                                    <th>adress</th>
                                    <th>email</th>
                                    <th>téléphone</th>
                                    <th>carte ID</th>
                                    <th>status</th>
                                    <th>outils</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            		<?php if($user->approveState == "pending"): ?>
                                    <tr>
                                        <td>
                                            <div class="round-img">
                                                <img src="<?php echo e($user->avatar); ?>" alt="">
                                            </div>
                                        </td>
                                        <td><?php echo e($user->username); ?></td>
										<td><?php echo e($user->firstName); ?></td>
										<td><?php echo e($user->lastName); ?></td>
										<td><?php echo e($user->adr); ?></td>
										<td><?php echo e($user->email); ?></td>
										<td><?php echo e($user->phoneNum); ?></td>
										<td><?php echo e($user->idCard); ?></td>
                                        <td><span class="badge badge-danger">pending</span></td>
                                        <td class="users-tools">
                                            <button class="btn btn-info active" id="<?php echo e($user->id); ?>" onclick="addApprovedUser(this,<?php echo e($user->id); ?>,'<?php echo e($user->approveState); ?>')">
                                                <i class="fa fa-calendar-check-o"></i>
                                            </button>
                                            <button  class="btn btn-danger" id="delete<?php echo e($user->id); ?>" onclick="deleteUser(<?php echo e($user->id); ?>)">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                        <br>
                    	<input type="submit" id="sub" value=" Save " class="btn btn-primary">
                </div>
        </div>
</div>
<br>
<div class="card" style="margin: 10px;">
                <div class="card-title">
                    <h2 style="text-align: center;">Approved users</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="usersDataTable" class="table">
                            <thead>
                                <tr>
                                    <th>pic</th>
                                    <th>username</th>
                                    <th>nom</th>
                                    <th>prénom</th>
                                    <th>adress</th>
                                    <th>email</th>
                                    <th>téléphone</th>
                                    <th>carte ID</th>
                                    <th>status</th>
                                    <th>outils</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                	<?php if($user->approveState == "Approved"): ?>
                                    <tr>
                                        <td>
                                            <div class="round-img">
                                                <img src="<?php echo e($user->avatar); ?>" alt="">
                                            </div>
                                        </td>
                                        <td><?php echo e($user->username); ?></td>
										<td><?php echo e($user->firstName); ?></td>
										<td><?php echo e($user->lastName); ?></td>
										<td><?php echo e($user->adr); ?></td>
										<td><?php echo e($user->email); ?></td>
										<td><?php echo e($user->phoneNum); ?></td>
										<td><?php echo e($user->idCard); ?></td>
                                        <td><span class="badge badge-success">approved</span></td>
                                        <td class="users-tools">
                                            <button  class="btn btn-danger" id="delete<?php echo e($user->id); ?>" onclick="deleteUser(<?php echo e($user->id); ?>)">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>
                        </table>
                        <br>
                        <input type="submit" id="sub" value=" Save " class="btn btn-primary">
                    </div>
                </div>
</div>