 <div class="row">
    <?=form_open('adminlogin')?>
    <span class="card-title">Admin Login</span> 
      <div class="row">
        <div class="input-field  col s12  ">
          <input id="uid" name="id" type="text" class="validate">
          <label for="uid">Id</label>
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