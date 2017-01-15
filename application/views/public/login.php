 <div class="row">
    <?=form_open('welcome/login')?>
    <span class="card-title"> Login</span> 
      <div class="row">
        <div class="input-field  col s12  ">
          <input id="email" name="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div> 
      <div class="row">
        <div class="input-field  col s12 ">
          <input id="password" name="password" type="password" class="validate">
          <label for="password">Password</label>
        </div> 
      </div> 
      <div class="row"> 
          <button class="btn red  darken-1 col s12" id="apply" style="min-width: 200px">Login</button>
      </div>   
      <input type="hidden" value="login" name="login">
    </form>
  </div> 
  <script>
  	$('.jf-card').css({'width':300,'margin':'30px auto'});
  </script>