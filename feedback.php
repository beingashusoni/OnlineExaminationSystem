<!DOCTYPE html>
<html >
<head>
	<link rel="icon" type="image/png"  href="image/clg.png">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>||Online Exam||</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>

</head>

<body>

<div class="row header">
<div class="col-lg-6">
<span class="logo">Online Exam</span></div>
<div class="col-md-2">
</div>
<div class="col-md-4">


<a href="index.php" class="pull-right btn sub1 title3"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home</a>&nbsp;
</div></div>



<div class="bg1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6 panel" style="background-color: ##eeeeeeed; min-height:430px;">
<h2 align="center" style="font-family:'typo'; color:#000066">FEEDBACK/REPORT A PROBLEM</h2>
<div style="font-size:14px">
<?php if(@$_GET['q'])echo '<span style="font-size:18px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;'.@$_GET['q'].'</span>';
else
{echo' 
You can send us your feedback through e-mail on the following e-mail id:<br/>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<a href="#" style="color:#000000">monishshrivastava99@gmail.com</a><br /><br />
</div><div class="col-md-1"></div></div>
<p>Or you can directly submit your feedback by filling the enteries below:-</p>
<form role="form"  method="post" action="feed.php?q=feedback.php">
<div class="row">
<div class="col-md-3"><b>Name:</b><br /><br /><br /><b>Subject:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text"><br />    
   <input id="name" name="subject" placeholder="Enter subject" class="form-control input-md" type="text">    

</div>
</div>
</div><!--End of row-->

<div class="row">
<div class="col-md-3"><b>E-Mail address:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">    
 </div>
</div>
</div><!--End of row-->

<div class="form-group"> 
<textarea rows="5" cols="8" name="feedback" class="form-control" placeholder="Write feedback here..."></textarea>
</div>
<div class="form-group" align="center">
<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
</div>
</form>';}?>
</div>
<div class="col-md-3"></div></div>
</div></div>
</div>

	 
      
    </div>
  </div>
</div>

</body>
</html>
