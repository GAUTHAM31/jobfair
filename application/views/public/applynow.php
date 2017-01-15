 <div class="row">
    <?=form_open('welcome/applynow')?>
    <span class="card-title"> Personal Informations</span>
      <div class="row"> 
        <div class="input-field  col s12 m6">
          <input id="fname" name="fname"  type="text" class="validate" >
          <label for="fname ">First Name </label>
        </div>
        <div class="input-field col s12 m6">
          <input id="lname" name="lname" type="text" class="validate" >
          <label for="lname ">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field  col s12 ">
          <input id="email" name="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div> 
      <div class="row">
        <div class="input-field  col s12 m6">
          <input id="password" name="password" type="password" class="validate">
          <label for="password">Choose a Password</label>
        </div>
        <div class="input-field  col s12 m6">
          <input id="repassword" name="repassword" type="password" class="validate">
          <label for="repassword">Confirm your password</label>
        </div>
      </div> 
      <div class="row"> 
        <div class="input-field  col s12 m6">
          <input id="phonenumber" name="phonenumber" type="number" minlength="8" class="validate" >
          <label for="phonenumber ">Phone Number </label>
        </div> 
        <div class="input-field  col s12 m6">
            <input id="dateofbirth" name="dateofbirth" type="date"  class="datepicker">
            <label for="dateofbirth">Date Of Birth </label>
        </div> 
      </div>

    <span class="card-title"> Choose Jobs to apply </span>  
    <?php $maxoptions=6;
    for($i=1;$i<=$maxoptions;$i++){?>
     <div  id="options<?=$i?>" class="row options  <?=($i!=1)?'hide-elem':' '?>">
        <div class="col s10">
            <label class="col s2 black-text left-align " style="margin-top: 1em">#<?=$i?></label>
            <select name="selectedoptions[]" id="optionid<?=$i?>" class="browser-default col s10" >
              <option value="0"  selected>Choose your option</option>
              <option value="1">Option 1</option>
              <option value="2">Option 2</option>
              <option value="3">Option 3</option>
            </select>
        </div>
         
     </div>
        <?php }?>
     <div class="row center-align">
       <div class="col s12">
         <div id="addmoreoptions" class="btn btn-flat red-box-dot ">Add more Options</div>
         <div id="deletemoreoptions" class="pointer linkhover" style="padding-left: 10px;display: inline-block;">Delete Last Option</div>
       </div>
     </div>
     <input type="hidden" value="applynow" name="apply">
      <div class="card-action row center-align"> 
          <button class="btn red darken  waves-effect waves-light" id="apply" >APPLY</button>
      </div>   
    </form>
  </div>
  <script>   
 
var noofclicks=2;
var maxoptions=<?=$maxoptions?>;
  $(document).ready(function(){
 
   
        $('#deletemoreoptions').click(function(){
          if(noofclicks>2)
          {
            $('#options'+(noofclicks-1)).hide(); 
            $('#optionid'+(noofclicks-1)).val(0).change(); 
           

            noofclicks--;
          }
        });
        $('#addmoreoptions').click(function(){
          if(noofclicks<maxoptions+1)
          {
            $('#options'+(noofclicks)).show();
            if(noofclicks!=maxoptions+1)
            noofclicks++;
          }
          console.log(noofclicks);
        });
        $('.datepicker').pickadate({
          selectYears: true,
          selectMonths: true,
          selectYears: 25 ,
          min: new Date(1980,1,1),
          max: new Date(2000,11,31),
          onSet: function( arg ){
          if ( 'select' in arg ){ //prevent closing on selecting month/year
          this.close();
          }
          }
        });


    });
    </script>
        