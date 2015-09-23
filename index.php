<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DropBox Picker</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body ng-app="DropboxControllers" ng-controller="DropBoxCtrl">
    <div>
       
        <hr/>
        <div class="col-sm-8">
            <div class="col-sm-4 center-block">
                <p><a class="btn btn-primary btn-block" href="javascript:;" drop-box-picker dbpicker-files="dpfiles">Dropbox Picker</a></p>
            </div>
            <div class="col-sm-4 center-block">
                <p><a class="btn btn-primary btn-block" href="javascript:;" box-picker boxpicker-files="boxfiles" >Box Picker</a></p>
            </div>
           
        </div>
        <div class="container col-sm-12">
            <div class="row show-grid" ng-switch="dpfiles.length > 0 || boxfiles.length > 0">
                <div ng-switch-when="true">
                    <div class="col-sm-4" ng-repeat="file in dpfiles">
                        <a href="{{ file.link }}" target="_blank"  value="{{ file.link }}"><img src="images/file1.png" class="img-responsive img-thumbnail"> {{ file.name }}</a>
                       <input value="{{ file.link }}"  class="hide" id="drop" type="submit">
					   
					   <script type="text/javascript">
	
						function ajax_post(){
							// Create our XMLHttpRequest object
							var hr = new XMLHttpRequest();
							// Create some variables we need to send to our PHP file
							var url = "download.php";
							var dropurls=document.getElementById("drop").value;
							var vars = "dropurl="+dropurls;
							hr.open("POST", url, true);
							// Set content type header information for sending url encoded variables in the request
							hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							// Access the onreadystatechange event for the XMLHttpRequest object
							hr.onreadystatechange = function() {
								if(hr.readyState == 4 && hr.status == 200) {
									var return_data = hr.responseText;
									document.getElementById("status").innerHTML = return_data;
								}
							}
							// Send the data to PHP now... and wait for response to update the status div
							hr.send(vars); // Actually execute the request
							document.getElementById("status").innerHTML = "processing...";
						}
						</script>
<input type="submit" value="Submit Data" onclick="ajax_post();">

						<button type="button" class="close" ng-click="remove($index)"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>

									
                    <div class="col-sm-4" ng-repeat="file in boxfiles">
                        <a href="{{ file.url }}" target="_blank"><img src="images/file1.png" class="img-responsive img-thumbnail"> {{ file.name }}</a>
                        
						
						
						
						
						<button type="button" class="close" ng-click="removeboxfiles($index)"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>
					
					
                </div>
            </div>
        </div>
		<div class="col-sm-12"id="status"></div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://app.box.com/js/static/select.js"></script>
    <script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="opsuezjazxy8x2q"></script>
    <script src="app.js"></script>
    <script src="dropbox-picker.min.js"></script>
	


  </body>
</html>