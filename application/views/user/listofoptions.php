<div class="card-title">Selected options</div>
<?php 
$i=1;
if(isset($options))
{

foreach ($options as $key => $value) {
?>

<div class="row">
	<div class="col s2 center-align"><?=$i++?></div> 
	<div class="col s10"><?=isset($jobtitle[$value['useroption']])?$jobtitle[$value['useroption']]:"-- error contact site admin immediately "?></div> 
</div>

<?php
  }
}?>
<div class="card-action center-align">
	<a href="<?=base_url()?>user/printout" class="btn btn red darken-1 "> <i class="fa-small fa fa-print fa-x1 fa-fw">	</i> Print Application</a> 
</div>

<?php 
if(isset($userdata))
{
?>	    </div> 
	  </div>
	</div>
</div>

<div class="row main-content">
	<div class="col s12 m10 l8 offset-s0 offset-m1 offset-l2 ">
	  <div class="card z-depth-4 jf-card"> 
	    <div class="card-content">
	    	<div class="row"> 
	    		<div class="card-title">
	    			Personal Information
	    	 		<a href="<?=base_url()?>user/editinfo" class="chip right pointer edit" style="margin-top: 0.5em"> <i class="fa fa-pencil"></i>  Edit</a>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col s3">Name</div>
	    		<div class="col s9"><?=$userdata['fname']?><?=$userdata['lname']?></div>
	    	</div>
	    	<div class="row">
	    		<div class="col s3">Email-id</div>
	    		<div class="col s9"><?=$userdata['email']?></div>
	    	</div>
	    	<div class="row">
	    		<div class="col s3">Date Of Birth</div>
	    		<div class="col s9"><?=$userdata['dob']?></div>
	    	</div>
	
<?php 
}
?>
<script>
	$('.jf-card').css({'max-width':500,'margin':'30px auto'});
</script>
