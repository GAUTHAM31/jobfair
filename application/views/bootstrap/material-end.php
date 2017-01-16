<footer class="page-footer grey darken-3">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Footer Content</h5>
            <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Links</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright grey darken-4">
        <div class="container">
        © 2014 Copyright Text
        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
      </div>
</footer>
<div class="btn-floating  waves-effect totop waves-light red fixed" style="position: fixed;right: 2%;bottom: 5%"> <i class="fa fa-chevron-up fa-2x"></i> </div>
</body> 
<script>
	function chktotop(){
		if ($(window).scrollTop()<300)
		{
		$('.totop').fadeOut();
		}
		else
		{
		$('.totop').fadeIn();
		}
	}
	$(".button-collapse").sideNav(); 
	$(window).scroll(function() { 
		chktotop();
	});
	$(document).ready(function(){
		chktotop();
		$('.totop').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
		});
	});
</script>
</html>