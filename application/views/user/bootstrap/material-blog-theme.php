<?php
if($this->input->get('msg')!=false)
{
	?>

<script>
	$(document).ready(function(){
		Materialize.toast("<?=$this->input->get('msg')?>", 5000) ;
	});
</script>
	<?php
}
?>
<div class="red lighten-1 banner"></div>
<!-- navigation-->
<nav class="transparent z-depth-0"> 
	<div class="nav-wrapper">
	  <a href="#!" class="brand-logo center">Job Fair</a>
	  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons fa fa-fw fa-bars "></i></a>
	  <ul class="right hide-on-med-and-down">
	    <li><a href="<?=base_url()?>user">Home</a></li> 
	    <li><a href="<?=base_url()?>user/editinfo">Edit Basic Info</a></li> 
	    <li><a href="<?=base_url()?>user/printout">Printout</a></li> 
	    <li><a href="<?=base_url()?>logout">Logout</a></li> 
	  </ul>
	  <ul class="side-nav" id="mobile-demo"> 
	    <li><a href="<?=base_url()?>user">Home</a></li> 
	    <li><a href="<?=base_url()?>user/editinfo">Edit Basic Info</a></li> 
	    <li><a href="<?=base_url()?>user/printout">Printout</a></li> 
	    <li><a href="<?=base_url()?>logout">Logout</a></li>  
	  </ul>
	</div>
</nav>
        
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
