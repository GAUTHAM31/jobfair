<div class="parallax-container">
      <div class="paralex-header">
        <h4>Lorem ipsum dolor sit am</h4>
        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur quas tempore non, quam recusandae! Officia quas, iusto eligendi? Neque unde cumque temporibus, eos distinctio rem sunt, libero dicta tempora velit!</p>
      </div>
    <div class="parallax">
    <img src="<?=base_url()?>assets/images/result.jpg">
    </div>
  </div>
  <div class="section white">
    <div class="row container">
        <div class="col s4">
             <h4 class="header center-align">Parallax</h4>
             <p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>
        </div>

        <div class="col s4">
             <h4 class="header center-align">Parallax</h4>
             <p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>
        </div>

        <div class="col s4">
             <h4 class="header center-align">Parallax</h4>
             <p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>
        </div>
    </div>
    <div class="row center-align">
      
        <div style="margin:50px auto;max-width:500px;text-align:center">
          <a href="<?=base_url()?>instructions" class="obj ">Register Now
            <div class="inner"></div>
            <div class="inner" style="border-left:0;border-right-color:rgba(216, 79, 57, 0.73);"></div>
          </a>
        </div>
    </div>
  </div>
  <div class="parallax-container"> 
    <div class="parallax">
    <img src="<?=base_url()?>assets/images/hdmqsqxjnbe-markus-spiske_opt.jpg"></div>
  </div>
    <div class="section grey center-align darken-3 white-text"  style="line-height: 50px;padding: 100px 0">
    <div class="row container">
        <div class="col s12 m5">
             <h5 class="header center-align small_underline">RECRUITER REGISTRATION</h5>
             <div>Recruiter registration is started!</div> <div class="btn red" style="margin-top: 10px">Click Here!</div> 
        </div>
      <div class="col s12 m5 offset-m1">
             <h5 class="header center-align small_underline">RECRUITER REGISTRATION</h5>
             <div>Recruiter registration is started!</div> <div class="btn red" style="margin-top: 10px">Click Here!</div> 
        </div>
 
 
    </div> 
  </div>
      <div class="section"  style="line-height: 50px;padding: 100px 0">
    <div class="row container">
        <div class="col s12 ">
              <div class="map-overlay" onClick="style.pointerEvents='none'"></div>
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.2967688077956!2d76.97719461478265!3d8.470495693909461!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b05baee56e6b99b%3A0x4ce024c88eb0ddcb!2sSree+Chitra+Thirunal+College+of+Engineering+Thiruvananthapuram!5e0!3m2!1sen!2sin!4v1484631324533" height="450" frameborder="0" style="border:0;width: 100%" class="z-depth-5" allowfullscreen></iframe>
        </div> 
 
 
    </div> 
  </div>
      <div class="section row"  style="line-height:30px;padding: 100px 0 0 0">
      <?php
      $this->view('public/tile')
      ?>
    </div>

  <script>$(document).ready(function(){
      $('.parallax').parallax();
    });</script>