<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<h1>User Profile</h1>
		<img style="width:10%" id="profile-image1" src='/storage/profile_pic/<?php echo e($user->profile_pic); ?>'>
		<table class="table table-responsive">
			<tr>
				<td><b>Name:</b></td>
				<td><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></td>
			</tr>
			<tr>
				<td><b>Email:</b></td>
				<td><?php echo e($user->email); ?></td>
			</tr>
			<tr>
				<td><b>Phone Number:</b></td>
				<td><?php echo e($user->phone); ?></td>
			</tr>
		</table>
	</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>