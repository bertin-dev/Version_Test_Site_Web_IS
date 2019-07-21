<style>

.login-wrap {
    padding: 20px;
}

.login-img3-body{
  background: url('images/bg-1.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

.login-form .login-img{
    font-size: 50px;
    font-weight: 300px;    
}

 .login-form{
    max-width: 350px;
    margin: 0 auto 0;
    background: rgba(213,215,222,0.4);
    border: 1px solid #B0B6BE;
}

.icon_lock_alt, .icon_key_alt
{
		font-family: 'ElegantIcons';
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;
	-webkit-font-smoothing: antialiased;
}

.icon_lock_alt:before {
	content: "\7e";
}

.icon_key_alt:before {
	content: "\e001";
}

.has-warning .input-group-addon {
  color: #ffcc00;
  border-color: #ffcc00;
  background-color: #fff0b3;
}

.has-error .input-group-addon {
  color: #ff2d55;
  border-color: #ff2d55;
  background-color: #ffe0e6;
}

.input-group {
  position: relative;
  display: table;
  border-collapse: separate;
}
.input-group.col {
  float: none;
  padding-left: 0;
  padding-right: 0;
}

.input-group .form-control {
  width: 100%;
  margin-bottom: 0;
}

.input-group-lg > .form-control,
.input-group-lg > .input-group-addon,
.input-group-lg > .input-group-btn > .btn {
  height: 45px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 6px;
}

.input-group-addon,
.input-group-btn,
.input-group .form-control {
  display: table-cell;
}
.input-group-addon:not(:first-child):not(:last-child),
.input-group-btn:not(:first-child):not(:last-child),
.input-group .form-control:not(:first-child):not(:last-child) {
  border-radius: 0;
}


.input-group-addon,
.input-group-btn {
  width: 1%;
  white-space: nowrap;
  vertical-align: middle;
}
.input-group-addon {
  padding: 6px 12px;
  font-size: 14px;
  font-weight: normal;
  line-height: 1;
  text-align: center;
  background-color: #f7f7f7;
  border: 1px solid #c7c7cc;
  border-radius: 4px;
}
.input-group-addon.input-sm {
  padding: 5px 10px;
  font-size: 12px;
  border-radius: 3px;
}

.input-group-addon input[type="radio"],
.input-group-addon input[type="checkbox"] {
  margin-top: 0;
}

.input-group .form-control:last-child,
.input-group-addon:last-child,
.input-group-btn:last-child > .btn,
.input-group-btn:last-child > .dropdown-toggle,
.input-group-btn:first-child > .btn:not(:first-child) {
  border-bottom-left-radius: 0;
  border-top-left-radius: 0;
}
.input-group-addon:last-child {
  border-left: 0;
}
.input-group-btn {
  position: relative;
  white-space: nowrap;
}
.input-group-btn > .btn {
  position: relative;
}
.input-group-btn > .btn + .btn {
  margin-left: -4px;
}

.input-group-btn > .btn:hover,
.input-group-btn > .btn:active {
  z-index: 2;
}
.login-form .input-group{
    padding-bottom: 15px;
}

.login-form .input-group-addon{
    padding: 6px 12px;
    font-size: 16px;
    color: #8b9199;
    font-weight: normal;
    line-height: 1;
    text-align: center;
    background-color: #ffffff;
    border: none;
    border-radius: 0;
}

.has-success .form-control {
  border-color: #4cd964;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}
.has-success .form-control:focus {
  border-color: #2ac845;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #a0ebad;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #a0ebad;
}

.form-control-static {
  margin-bottom: 0;
  padding-top: 7px;
}

  .form-inline .form-control {
    display: inline-block;
  }
  
  .input-group .form-control {
  width: 100%;
  margin-bottom: 0;
}

.input-group .form-control:first-child,
.input-group-addon:first-child,
.input-group-btn:first-child > .btn,
.input-group-btn:first-child > .dropdown-toggle,
.input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle) {
  border-bottom-right-radius: 0;
  border-top-right-radius: 0;
}

.input-group .form-control:last-child,
.input-group-addon:last-child,
.input-group-btn:last-child > .btn,
.input-group-btn:last-child > .dropdown-toggle,
.input-group-btn:first-child > .btn:not(:first-child) {
  border-bottom-left-radius: 0;
  border-top-left-radius: 0;
}
  .navbar-form .form-control {
    display: inline-block;
  }
  
  .form-control:-moz-placeholder {
  color: #d7d7d7;
}
.form-control::-moz-placeholder {
  color: #d7d7d7;
}
.form-control:-ms-input-placeholder {
  color: #d7d7d7;
}
.form-control::-webkit-input-placeholder {
  color: #d7d7d7;
}
.form-control {
  display: block;
  width: 100%;
  height: 34px;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.428571429;
  color: #8e8e93;
  vertical-align: middle;
  background-color: #ffffff;
  border: 1px solid #c7c7cc;
  border-radius: 4px;  
  -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
  transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
.form-control:focus {
  border-color: #007AFF;
  outline: 0;  
}
.form-control[disabled],
.form-control[readonly],
fieldset[disabled] .form-control {
  cursor: not-allowed;
  background-color: #f7f7f7;
}
textarea.form-control {
  height: auto;
}

.login-form .form-control {
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}


.login-form .form-control:focus {
    z-index: 2;
}

.navbar-form .form-control{
    width: 200px;
    height: 30px;
    background: white url('../img/icons/search-line-icon.png') no-repeat 3px;
    padding-left: 24px;
    margin-top: 1px;    
}

.radio input[type="radio"],
.radio-inline input[type="radio"],
.checkbox input[type="checkbox"],
.checkbox-inline input[type="checkbox"] {
  float: left;
  margin-left: -20px;
}

input[type="radio"],
input[type="checkbox"] {
  margin: 4px 0 0;
  margin-top: 1px \9;
}

input[type="checkbox"],
input[type="radio"] {
  box-sizing: border-box;
  padding: 0;
}

.has-switch input[type=checkbox] {
    display: none;
}

.checkbox, .checkbox:hover, .checkbox:focus  {
	border:none;
}

.mail-option .chk-all input[type=checkbox] {
    margin-top: 0;
}

.login-form .checkbox {
    margin-bottom: 14px;
}
.login-form .checkbox {
    font-weight: normal;    
    font-weight: 300;
    font-family: 'Lato', sans-serif;
}

.pull-right {
  float: right !important;
}
















.btn {
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: normal;
  line-height: 1.428571429;
  text-align: center;
  vertical-align: middle;
  cursor: pointer;
  border: 1px solid transparent;
  border-radius: 4px;
  white-space: nowrap;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
  font-weight: 300;
  -webkit-transition: all 0.15s;
  -moz-transition: all 0.15s;
  transition: all 0.15s;
}


.btn:focus {
  /*outline: thin dotted #333;
  outline: 5px auto -webkit-focus-ring-color;
  outline-offset: -2px;*/
  outline: none;
}
.btn:hover,
.btn:focus {
  color: #2b2b2b;
  text-decoration: none;
}
.btn:active,
.btn.active {  
}
.btn.disabled,
.btn[disabled],
fieldset[disabled] .btn {
  cursor: not-allowed;
  pointer-events: none;
  opacity: 0.65;
  filter: alpha(opacity=65);
  -webkit-box-shadow: none;
  box-shadow: none;
}
.btn-default {
  color: #2b2b2b;
  background-color: #ffffff;
  border-color: #c7c7cc;
}
.btn-default:hover,
.btn-default:focus,
.btn-default:active,
.btn-default.active,
.open .dropdown-toggle.btn-default {
  color: #ffffff;
  background-color: #9e9e9e;
  border-color: #9e9e9e;
}
.btn-default:active,
.btn-default.active,
.open .dropdown-toggle.btn-default {
  background-image: none;
}
.btn-default.disabled,
.btn-default[disabled],
fieldset[disabled] .btn-default,
.btn-default.disabled:hover,
.btn-default[disabled]:hover,
fieldset[disabled] .btn-default:hover,
.btn-default.disabled:focus,
.btn-default[disabled]:focus,
fieldset[disabled] .btn-default:focus,
.btn-default.disabled:active,
.btn-default[disabled]:active,
fieldset[disabled] .btn-default:active,
.btn-default.disabled.active,
.btn-default[disabled].active,
fieldset[disabled] .btn-default.active {
  background-color: #ffffff;
  border-color: #c7c7cc;
}
.btn-primary {
  color: #ffffff;
  background-color: #007aff;
  border-color: #007aff;
}
.btn-primary:hover,
.btn-primary:focus,
.btn-primary:active,
.btn-primary.active,
.open .dropdown-toggle.btn-primary {
  color: #007aff;
  border-color: #007aff;
  background: transparent;  
}
.btn-primary:active,
.btn-primary.active,
.open .dropdown-toggle.btn-primary {
  background-image: none;
}
.btn-primary.disabled,
.btn-primary[disabled],
fieldset[disabled] .btn-primary,
.btn-primary.disabled:hover,
.btn-primary[disabled]:hover,
fieldset[disabled] .btn-primary:hover,
.btn-primary.disabled:focus,
.btn-primary[disabled]:focus,
fieldset[disabled] .btn-primary:focus,
.btn-primary.disabled:active,
.btn-primary[disabled]:active,
fieldset[disabled] .btn-primary:active,
.btn-primary.disabled.active,
.btn-primary[disabled].active,
fieldset[disabled] .btn-primary.active {
  background-color: #007aff;
  border-color: #007aff;
}
.btn-warning {
  color: #ffffff;
  background-color: #ffcc00;
  border-color: #ffcc00;
}
.btn-warning:hover,
.btn-warning:focus,
.btn-warning:active,
.btn-warning.active,
.open .dropdown-toggle.btn-warning {
  color: #ffcc00;
  background: transparent;
  border-color: #ffcc00;
}
.btn-warning:active,
.btn-warning.active,
.open .dropdown-toggle.btn-warning {
  background-image: none;
}
.btn-warning.disabled,
.btn-warning[disabled],
fieldset[disabled] .btn-warning,
.btn-warning.disabled:hover,
.btn-warning[disabled]:hover,
fieldset[disabled] .btn-warning:hover,
.btn-warning.disabled:focus,
.btn-warning[disabled]:focus,
fieldset[disabled] .btn-warning:focus,
.btn-warning.disabled:active,
.btn-warning[disabled]:active,
fieldset[disabled] .btn-warning:active,
.btn-warning.disabled.active,
.btn-warning[disabled].active,
fieldset[disabled] .btn-warning.active {
  background-color: #ffcc00;
  border-color: #ffcc00;
}
.btn-danger {
  color: #ffffff;
  background-color: #ff2d55;
  border-color: #ff2d55;
}
.btn-danger:hover,
.btn-danger:focus,
.btn-danger:active,
.btn-danger.active,
.open .dropdown-toggle.btn-danger {
  color: #ff2d55;
  background: transparent;
  border-color: #ff2d55;
}
.btn-danger:active,
.btn-danger.active,
.open .dropdown-toggle.btn-danger {
  background-image: none;
}
.btn-danger.disabled,
.btn-danger[disabled],
fieldset[disabled] .btn-danger,
.btn-danger.disabled:hover,
.btn-danger[disabled]:hover,
fieldset[disabled] .btn-danger:hover,
.btn-danger.disabled:focus,
.btn-danger[disabled]:focus,
fieldset[disabled] .btn-danger:focus,
.btn-danger.disabled:active,
.btn-danger[disabled]:active,
fieldset[disabled] .btn-danger:active,
.btn-danger.disabled.active,
.btn-danger[disabled].active,
fieldset[disabled] .btn-danger.active {
  background-color: #ff2d55;
  border-color: #ff2d55;
}
.btn-success {
  color: #ffffff;
  background-color: #4cd964;
  border-color: #4cd964;
}
.btn-success:hover,
.btn-success:focus,
.btn-success:active,
.btn-success.active,
.open .dropdown-toggle.btn-success {
  color: #4cd964;
  background: transparent;
  border-color: #4cd964;
}
.btn-success:active,
.btn-success.active,
.open .dropdown-toggle.btn-success {
  background-image: none;  
  outline: none;
}
.btn-success.disabled,
.btn-success[disabled],
fieldset[disabled] .btn-success,
.btn-success.disabled:hover,
.btn-success[disabled]:hover,
fieldset[disabled] .btn-success:hover,
.btn-success.disabled:focus,
.btn-success[disabled]:focus,
fieldset[disabled] .btn-success:focus,
.btn-success.disabled:active,
.btn-success[disabled]:active,
fieldset[disabled] .btn-success:active,
.btn-success.disabled.active,
.btn-success[disabled].active,
fieldset[disabled] .btn-success.active {
  background-color: #4cd964;
  border-color: #4cd964;
}
.btn-info {
  color: #ffffff;
  background-color: #34aadc;
  border-color: #34aadc;
}
.btn-info:hover,
.btn-info:focus,
.btn-info:active,
.btn-info.active,
.open .dropdown-toggle.btn-info {
  color: #34aadc;
  background: transparent;
  border-color: #34aadc;
}
.btn-info:active,
.btn-info.active,
.open .dropdown-toggle.btn-info {
  background-image: none;
}
.btn-info.disabled,
.btn-info[disabled],
fieldset[disabled] .btn-info,
.btn-info.disabled:hover,
.btn-info[disabled]:hover,
fieldset[disabled] .btn-info:hover,
.btn-info.disabled:focus,
.btn-info[disabled]:focus,
fieldset[disabled] .btn-info:focus,
.btn-info.disabled:active,
.btn-info[disabled]:active,
fieldset[disabled] .btn-info:active,
.btn-info.disabled.active,
.btn-info[disabled].active,
fieldset[disabled] .btn-info.active {
  background-color: #34aadc;
  border-color: #34aadc;
}
.btn-link {
  color: #007aff;
  font-weight: normal;
  cursor: pointer;
  border-radius: 0;
}
.btn-link,
.btn-link:active,
.btn-link[disabled],
fieldset[disabled] .btn-link {
  background-color: transparent;
  -webkit-box-shadow: none;
  box-shadow: none;
}
.btn-link,
.btn-link:hover,
.btn-link:focus,
.btn-link:active {
  border-color: transparent;
}
.btn-link:hover,
.btn-link:focus {
  color: #0055b3;
  text-decoration: underline;
  background-color: transparent;
}
.btn-link[disabled]:hover,
fieldset[disabled] .btn-link:hover,
.btn-link[disabled]:focus,
fieldset[disabled] .btn-link:focus {
  color: #d7d7d7;
  text-decoration: none;
}
.btn-lg {
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 6px;
}
.btn-sm,
.btn-xs {
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
}
.btn-xs {
  padding: 1px 5px;
}
.btn-block {
  display: block;
  width: 100%;
  padding-left: 0;
  padding-right: 0;
}
.btn-block + .btn-block {
  margin-top: 5px;
}
input[type="submit"].btn-block,
input[type="reset"].btn-block,
input[type="button"].btn-block {
  width: 100%;
}

*,
*:before,
*:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

body {
    color: #797979;
    background: #eeeeee;
    font-family: 'Lato', sans-serif;
    padding: 0px !important;
    margin: 0px !important;
    font-size:14px !important;    
}
::selection {
    background: #688a7e;
    color: #fff;
}



</style>












<div class="modal fade" id="login_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="login-img3-body modal-content">
			<!--<div class="modal-header" style="background-color: #D9DBE2;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<center><h2 class="modal-title" id="myModalLabel">ESPACE ETUDIANT </h2></center>
				
				    <section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-9 col-lg-9">
				<ul class="breadcrumb">
					<li><a href="index.php" title="Accueil | INSTITUT SALOMON"><i class="fa fa-home fa-2x"></i></a><i class="icon-angle-right"></i></li>
					<li class="active" title="Connectez-Vous Ici">Connexion</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
				
			</div>-->		

				
        <!----------------------------------------------------------ESPACE FORMATEURS------------------------------------------------------------->
			<div class="modal-body col-lg-6" style="display:block;" id="uploads2">
				
			
	  <div class="alert alert-info">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center><strong style="font-size:1.2em;">ESPACE FORMATEURS !!!!</strong><br></center>
	</div>
	 <center><div id="rapport" class="alert alert-danger" style="display:none;"></div></center>

	  
	  <form id="go" class="login-form" action="traitement.php?go=go" method="post" enctype="multipart/form-data">        
        <div class="login-wrap">
          
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope fa-2x"></i></span>
              <input type="email" name="email" class="form-control" placeholder="Ex: info@the-builders.org" autofocus required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-2x"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Mot de Passe" required="required">
            </div>
            <label class="**checkbox">
                <span class="pull-left"><input type="checkbox" name="t_and_c" id="t_and_c" value="1" data-color="info"> Restez-Connecté ! </span>&nbsp &nbsp &nbsp &nbsp
                <span class="pull-right"> <a href="forget.php" title="Cliquez ici si vous avez oublié votre password" style="color:#797979; text-align: right;">   Password Oublié ? </a></span>
            </label>
			
		
					
            <button class="btn btn-info btn-lg btn-block" type="submit" title="CONNECTEZ-VOUS">CONNEXION</button>
        </div>
		<div style="display:none;" id="uploads3">
				<center> <img src="ajax-loader28.gif"></center>
				</div>
      </form>
				 
			</div>
			
			
			
			
			
			
			
			
			
        <!-------------------------------btn-primary---------------------------ESPACE ETUDIANTS------------------------------------------------------------->
			<div class="modal-body col-lg-6" style="display:block;" id="uploads12">
				
			
	  <div class="alert alert-info">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center><strong style="font-size:1.2em;">ESPACE ETUDIANTS !!!!</strong><br></center> 
	  </div>
	   <center><div id="rapport10" class="alert alert-danger" style="display:none;"></div></center>

	  
	  <form id="goE" class="login-form" action="traitement.php?goE=goE" method="post" enctype="multipart/form-data">        
        <div class="login-wrap">
     
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope fa-2x"></i></span>
              <input type="email" name="emailE" class="form-control" placeholder="Ex: institutsalomon1@gmail.com" autofocus required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-2x"></i></span>
                <input type="password" name="passwordE" class="form-control" placeholder="Mot de Passe" required="required">
            </div>
            <label class="**checkbox">
                <span class="pull-left"><input type="checkbox" name="t_and_c" id="t_and_c" value="1" data-color="info"> Restez-Connecté ! </span>&nbsp &nbsp &nbsp &nbsp
                <span class="pull-right"> <a href="forget.php" title="Cliquez ici si vous avez oublié votre password" style="color:#797979; text-align: right;">   Password Oublié ? </a></span>
            </label>
			
		
					
            <button class="btn btn-info btn-lg btn-block" type="submit" title="CONNECTEZ-VOUS">CONNEXION</button>
        </div>
		<div style="display:none;" id="uploads13">
				<center> <img src="ajax-loader28.gif"></center>
		</div>
      </form>
				 
			</div>
			
			
			
			
			 <div class="modal-footer">
			 <a href="inscription.php" title="PORTAIL D'INSCRIPTION"><button class="btn btn-info btn-lg btn-block" type="button">INSCRIPTION</button></a>
			</div>

			
			
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!--code JQUERY***********************************-->
    <script src="jquery.js"></script>
    <script>
      $(function() {
			
			
		  $('#go').on('submit', function (e) {
        // On empêche le navigateur de soumettre le formulaire
        e.preventDefault();
		$('#uploads2').show();
		$('#uploads3').show();
        var $form = $(this);
        var formdata = (window.FormData) ? new FormData($form[0]) : null;
        var data = (formdata !== null) ? formdata : $form.serialize();
 
        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            contentType: false, // obligatoire pour de l'upload
            processData: false, // obligatoire pour de l'upload
            dataType: 'html', // selon le retour attendu
            data:data,
            success:function(data){
				$('#uploads3').hide();
				if(data==1)
				{$('#uploads2').hide();
				$(location).attr('href',"prof.php");	
				}else
				{
					$('#rapport').text(data).show();
				}
				
	}
           
       });
        });
      
      });
      </script>
	  
	  
	  
	  
	  <script>
      $(function() {
			
			
		  $('#goE').on('submit', function (e) {
        // On empêche le navigateur de soumettre le formulaire
        e.preventDefault();
		$('#uploads12').show();
		$('#uploads13').show();
        var $form = $(this);
        var formdata = (window.FormData) ? new FormData($form[0]) : null;
        var data = (formdata !== null) ? formdata : $form.serialize();
 
        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            contentType: false, // obligatoire pour de l'upload
            processData: false, // obligatoire pour de l'upload
            dataType: 'html', // selon le retour attendu
            data:data,
            success:function(data){
				$('#uploads13').hide();
				if(data==2)
				{$('#uploads12').hide();
				$(location).attr('href',"actualites.php");	
				}else
				{
					$('#rapport10').text(data).show();
				}
				
	}
           
       });
        });
      
      });
      </script>