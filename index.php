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
  
  
  
    <div class="container">
       
	 <div class="col-sm-8">
        <hr/>
		
		
        <div class="col-sm-2">
		
			<div class="btn-group-vertical" role="group" aria-label="...">
		
			   <a class="btn btn-primary btn-block" href="javascript:;" drop-box-picker dbpicker-files="dpfiles">Dropbox Picker</a>
			   <a class="btn btn-primary btn-block" href="javascript:;" box-picker boxpicker-files="boxfiles" >Box Picker</a>
			   
			</div>
		</div>
        <div class="col-sm-6">
            <div class="row show-grid" ng-switch="dpfiles.length > 0 || boxfiles.length > 0">
                <div class="col-sm-12" ng-switch-when="true">
                    <div class="col-sm-12" ng-repeat="file in dpfiles">				
					<button type="button" class="close" ng-click="remove($index)"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<div class="input-group">
							<input type="text" class="form-control" id="filename" value="{{ file.name }}">
							<div class="input-group-btn">
								<button class="btn" value="{{ file.link }}"   id="drop" type="submit" onclick="ajax_post();"> 上传 </button>
								
							</div>
						</div>
						<div class="col-sm-12"id="status"></div>
                      

						
					  
					   

                    </div>

									
                    <div class="col-sm-12" ng-repeat="file in boxfiles">
                  	<button type="button" class="close" ng-click="removeboxfiles($index)"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<div class="input-group">
							<input type="text" class="form-control" id="filename" value="{{ file.name }}">
							<div class="input-group-btn">
								<button class="btn" value="{{ file.url }}"   id="drop" type="submit" onclick="ajax_post();"> 上传 </button>
							</div>
						</div>
						<div class="col-sm-12"id="status"></div>
						
						
						
						
                    </div>
					
					
                </div>
            </div>
        </div>
	  </div>

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
	
<script type="text/javascript">
	
						function ajax_post(){
							// Create our XMLHttpRequest object
							var hr = new XMLHttpRequest();
							// Create some variables we need to send to our PHP file
							var down = "download.php";
							var dropurls=encodeURI(document.getElementById("drop").value);
							var filename=encodeURI(document.getElementById("filename").value);
							var vars = "dropurl="+dropurls+"&filename="+filename ;
							hr.open("POST", down, true);
							hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
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

  </body>
</html>