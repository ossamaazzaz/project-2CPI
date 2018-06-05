<br>
<div class="card" style="margin: 10px;">
                <div class="card-title">
                    <h2 style="text-align: center;">Utilisateurs en attente</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="usersDataTable" class="table">
                            <thead>
                                <tr>
                                    <th>Avatar</th>
                                    <th>Username</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Adresse</th>
                                    <th>Email</th>
                                    <th>Tél</th>
                                    <th>Carte ID</th>
                                    <th>Status</th>
                                    <th>Outils</th>
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
                                        <td><span class="badge badge-danger">En Attente</span></td>
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
                    <h2 style="text-align: center;">Utilisateurs Acceptés</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="usersDataTable" class="table">
                            <thead>
                                <tr>
                                    <th>Avatar</th>
                                    <th>Username</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Adresse</th>
                                    <th>Email</th>
                                    <th>Tél</th>
                                    <th>Carte ID</th>
                                    <th>Status</th>
                                    <th>Outils</th>
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
                                        <td><span class="badge badge-success">Accepté</span></td>
                                        <td class="users-tools">
                                            <form method="POST" action="/admin/users/AddPrepa">
                                               <input type="hidden" id="input" value="<?php echo e($user->id); ?>" name="input"> 
                                               <button type="submit" class="btn btn-primary" alt="Make praparator" id="AddPrepa">
                                                    <i class="fa fa-user"></i>                           
                                                </button>                                               
                                            </form>

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
                        <input type="submit" id="sub2" value=" Save " class="btn btn-primary">
                    </div>
                </div>
</div>