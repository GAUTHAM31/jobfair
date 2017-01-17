<?php
if(isset($_GET['msg']) && strlen($_GET['msg'])>1 )
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
<div class="blue  lighten-1 banner"></div>
<!-- navigation-->
<nav class="transparent z-depth-0"> 
	<div class="nav-wrapper">
	  <a href="#!" class="brand-logo center">Admin Area</a>
	  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons fa fa-fw fa-bars "></i></a>
	  <ul class="right hide-on-med-and-down"> 
	    <li><a href="<?=base_url()?>logout?rdir=adminlogin">Logout</a></li> 
	  </ul>
	  <ul class="side-nav" id="mobile-demo"> 
	    <li><a href="<?=base_url()?>logout?&rdir=adminlogin">Logout</a></li> 
	  </ul>
	</div>
</nav>
        
<div class="row main-content">
	<div class="col s12 m10 l8 offset-s0 offset-m1 offset-l2 "> 
	    	<?php
	    		$this->view($content,$data);
	    	?> 
	</div>
</div> 