
  function _(elmt){
  	return document.getElementById(elmt);
  }


  function uploadFichier(){
  	var image = _('image').files[0];
  	var data = new FormData();
  	data.append('image', image);

  	var ajax = new XMLHttpRequest();
     ajax.upload.addEventListener("progress", progressHandler, false);

     ajax.addEventListener("load", completeHandler, false);

     ajax.addEventListener("error", errorHandler, false);

     ajax.addEventListener("abort", abortHandler, false);

     ajax.open("POST", "upload.php");
     ajax.send(data);
  }


  function progressHandler(event){

  	_('status_bytes').innerHTML = event.loaded + ' bytes uploadé sur ' + event.total; 

  	var pourcentage = (event.loaded / event.total) * 100;
  	_('progressBar').value = Math.round(pourcentage);
  	_('status').innerHTML = Math.round(pourcentage) + '% uploadé... patientez';

  }


   function completeHandler(event){
   	_('status').innerHTML = event.target.responseText;
  	_('progressBar').value = 0;
  }  


   function errorHandler(){
  	_('status').innerHTML = "L'upload a echoué";
  }


   function abortHandler(){
   	_('status').innerHTML = "L'upload a été annulé";
  	
  }
