<div class="col-sm-12 col-md-12 col-lg-12  col-xl-3">
<?php require_once "./sammary_functions.php"?>
<div class="headingTertiary text-light">My Account</div>
<div class="card">
<div class="card-header">My stats</div>
<div class="card-body">
<table class="table  table-bordered table-hover ">
<tbody>
<tr>
<td>Account Balance</td>
<td><?php echo "$" . balance($_SESSION['user_id']); ?></td>
</tr>
<tr>
<td>Account Status</td>
<td class="pt-3"><?php if (account_rating($_SESSION['user_id']) < 2) {?>
<span class="alert alert-danger">New Tutor</span>
<?php } elseif (account_rating($_SESSION['user_id']) > 2 and account_rating($_SESSION['user_id']) < 5) {?>
<span class="alert alert-warning">Premium Tutor</span>
<?php } elseif (account_rating($_SESSION['user_id']) > 5 and account_rating($_SESSION['user_id']) < 8) {?>
<span class="alert alert-warning">Elite Tutor</span>
<?php } else {?>
<span class="alert alert-success">Perfect Tutor</span>
<?php }?></td>
</tr>
<tr>
<td>Account Rating</td>
<td><?php echo account_rating($_SESSION['user_id']); ?></td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="card mt-5">
<div class="card-header text-uppercase">Recent events</div><!--card header-->
<div class="card-body" id="cbody">
<?php events($_SESSION['user_id'])?>
</div><!--card body-->
<!-- <div class="card-footer"><a href="notes" class="btn btn-info btn-block">VIEW ALL</a></div> -->
</div><!--card-->
</div>
