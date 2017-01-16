
 <ul class="collapsible popout "  >
    <li>
      <div class="collapsible-header"><i class="fa fa-list"></i>Close / Open Form</div>
      <div class="collapsible-body center-align"><p><?=form_open('admin/closeall' ,['style'=>'display:inline-block'])?><button class="btn red lighten-2">Close</button></form>
      <?=form_open('admin/openall' ,['style'=>'display:inline-block'])?><button class="btn green lighten-2">Open</button></form></p></div>
    </li>
    <li>
      <div class="collapsible-header active"><i class="fa fa-list"></i>Add Company</div>
      <div class="collapsible-body">
	      	<?=form_open('admin/addcompany')?>
	      	<input type="hidden" name="addcompany" value="true">
			<div class="row">
			 	<div class="input-field  col s12 m8 offset-m2"> 
					<input id="name" name="name" type="text" class="validate">
					<label for="name">name of Company</label> 
			 	</div>
			 </div> 
			<div class="row">
			 	<div class="input-field  col s4  	offset-m2"> 
					<input id="seats" name="seats" type="number" class="validate">
					<label for="seats">Toal Seats</label> 
			 	</div>
			 </div> 
			<div class="row center-align">
			 	<div class="col s12 "> 
					<button class="btn red">Add Company</button>
			 	</div>
			 </div> 
	      	</form>
      	</div>
    </li>
    <li>
      <div class="collapsible-header "><i class="fa fa-list"></i>Third</div>
      <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
    </li>
  </ul>
