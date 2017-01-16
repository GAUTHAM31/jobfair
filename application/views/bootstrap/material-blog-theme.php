<?php
if(isset($_GET['msg']) && strlen($_GET['msg'])>1  && (!isset($_GET['longmsg'])))
{
	 
	?>

<script>
	$(document).ready(function(){
		Materialize.toast("<?=$this->input->get('msg')?>",5000) ;
	});
</script>
	<?php
}
?>
<div class="red  lighten-1 banner"></div>
<!-- navigation-->
<nav class="transparent z-depth-0"> 
	<div class="nav-wrapper">
	  <a href="#!" class="brand-logo center">Job Fair</a>
	  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons fa fa-fw fa-bars "></i></a>
	  <ul class="right hide-on-med-and-down">
	    <li><a href="<?=base_url()?>">Instructions</a></li>
	    <li><a href="<?=base_url()?>applynow">Apply For Job Fair</a></li>
	    <li><a href="<?=base_url()?>login">Login</a></li> 
	  </ul>
	  <ul class="side-nav" id="mobile-demo">
	    <li><a href="<?=base_url()?>">Instructions</a></li>
	    <li><a href="<?=base_url()?>applynow">Apply For Job Fair</a></li>
	    <li><a href="<?=base_url()?>login">Login</a></li> 
	  </ul>
	</div>
</nav>
<?php 
if(isset($_GET['longmsg'])){
?>  
<div class="row">
	<div class="card-panel grey darken-4 white-text col s12 m8 offset-m2">
		<?=$this->input->get('msg')?>
	</div>
</div>
<?php
}
?>
<div class="row main-content">
	<div class="col s12 m10 l8 offset-s0 offset-m1 offset-l2 ">
	  <div class="card z-depth-4 jf-card"> 
	    <div class="card-content">
	    	<?php
	    		$this->view($content,$data);
	    	?>
	    </div> 
	  </div>
	</div> 
</div> 