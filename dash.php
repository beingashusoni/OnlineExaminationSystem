<!DOCTYPE html>
<html>
<head>
<link rel="icon"  type="image/png"  href="image/clg.png">
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
<script>
$(function () {
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$(".logo").height())
        {
             $(".navbar").addClass("navbar-fixed-top");
        }

        if($(window).scrollTop()<$(".logo").height())
        {
             $(".navbar").removeClass("navbar-fixed-top");
        }
    });
});

function validateForm() {var y = document.forms["form"]["name"].value;  var letters = /^[A-Za-z]+$/;if (y == null || y == "") {alert("Name Is Empty.");return false;}var x = document.forms["form"]["email"].value;var atpos = x.indexOf("@");
var dotpos = x.lastIndexOf(".");if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {alert("Not a valid e-mail address.");return false;}var z =document.forms["form"]["branch"].value;if (z == null || z == "") {alert("Branch is Empty.");return false;}var a = document.forms["form"]["password"].value;if(a == null || a == ""){alert("Password Is Empty");return false;}if(a.length<5 || a.length>25){alert("Week Password.");return false;}
var b = document.forms["form"]["cpassword"].value;if (a!=b){alert("Password Not Matched.");return false;}}


</script>
</head>

<body  style="background:#eee;">
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">Online Exam</span></div>
<?php
 include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];;

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="dash.php?q=0" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Logout</button></a></span>';
}?>

</div></div>

<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dash.php?q=0"><b>Dashboard</b></a>
    </div>
  
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="dash.php?q=0">Home<span class="sr-only">(current)</span></a></li>
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="dash.php?q=1">Students</a></li>
        <li <?php if(@$_GET['q']==8) echo'class="active"'; ?>><a href="dash.php?q=8">Staff</a></li>
        <li <?php if(@$_GET['q']==7) echo'class="active"'; ?>><a href="dash.php?q=7">Add Staff</a></li>
		<li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="dash.php?q=2">Ranking</a></li>
		<li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="dash.php?q=3">Feedback</a></li>
        <li class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quiz<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="dash.php?q=4">Add Quiz</a></li>
            <li><a href="dash.php?q=5">Remove Quiz</a></li>
			
          </ul>
        

     
          </div>
  </div>
</nav>

<div class="container">
<div class="row">
<div class="col-md-12">

<?php if(@$_GET['q']==0) {

$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Branch</b></td><td><b>Semester</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
  $branch = $row['branch'];
  $sem = $row['sem'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
	$eid = $row['eid'];
$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
$rowcount=mysqli_num_rows($q12);	
if($rowcount == 0){
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$branch.'</td><td>'.$sem.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'"</a></b></td></tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td></tr>';
}
}
$c=0;
echo '</table></div></div>';

}

if(@$_GET['q']== 2) 
{
$q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>Rank</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Branch</b></td><td><b>Semester</b></td><td><b>Roll Number</b></td><td><b>Score</b></td></tr>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$e=$row['email'];
$s=$row['score'];
$q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
while($row=mysqli_fetch_array($q12) )
{
$name=$row['name'];
$gender=$row['gender'];
$branch=$row['branch'];
$sem=$row['sem'];
$roll=$row['roll'];
}
$c++;
echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$branch.'</td><td>'.$sem.'</td><td>'.$roll.'</td><td>'.$s.'</td><td>';
}
echo '</table></div></div>';}

?>

<?php if(@$_GET['q']==1) {

$result = mysqli_query($con,"SELECT * FROM user") or die('Error');
echo  '
<form action="" method="GET">
        <input type="text" name="search" />
        <input type="submit" value="Search"/>
    </form>
<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Branch</b></td><td><b>Semester</b></td><td><b>Roll Number</b></td><td><b>Email</b></td><td><b>Mobile</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$mob = $row['mob'];
	$gender = $row['gender'];
    $email = $row['email'];
	$branch = $row['branch'];
  $sem = $row['sem'];
  $roll = $row['roll'];
	echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$branch.'</td><td>'.$sem.'</td><td>'.$roll.'</td><td>'.$email.'</td><td>'.$mob.'</td>
	<td><a title="Delete User" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
}
$c=0;
echo '</table></div></div>';

}?>

<?php if(@$_GET['q']==8) {

$resul = mysqli_query($con,"SELECT * FROM staff") or die('Error');
echo  '
<form action="" method="GET">
        <input type="text" name="query" />
        <input type="submit" value="Search" />
    </form>
<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Name</b></td><td><b>Email</b></td><td><b>Gender</b></td><td><b>Contact</b></td><td><b>Branch</b></td></tr>';
$c=1;
while($row = mysqli_fetch_array($resul)) {
  $name = $row['name'];
  $email = $row['email'];
  $gender = $row['gender'];
    $mobile = $row['mobile'];
  $branch = $row['branch'];

  echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$email.'</td><td>'.$gender.'</td><td>'.$mobile.'</td><td>'.$branch.'</td>
  <td><a title="Delete Staff" href="update.php?email='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
}
$c=0;
echo '</table></div></div>';

}?>

<?php if(@$_GET['q']==3) {
$result = mysqli_query($con,"SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Subject</b></td><td><b>Email</b></td><td><b>Date</b></td><td><b>Time</b></td><td><b>By</b></td><td></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$subject = $row['subject'];
	$name = $row['name'];
	$email = $row['email'];
	$id = $row['id'];
	 echo '<tr><td>'.$c++.'</td>';
	echo '<td><a title="Click to open feedback" href="dash.php?q=3&fid='.$id.'">'.$subject.'</a></td><td>'.$email.'</td><td>'.$date.'</td><td>'.$time.'</td><td>'.$name.'</td>
	<td><a title="Open Feedback" href="dash.php?q=3&fid='.$id.'"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
	echo '<td><a title="Delete Feedback" href="update.php?fdid='.$id.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>

	</tr>';
}
echo '</table></div></div>';
}
?>

<?php if(@$_GET['fid']) {
echo '<br />';
$id=@$_GET['fid'];
$result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$subject = $row['subject'];
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$feedback = $row['feedback'];
	
echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;'.$date.'</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div></div>';}
}?>


<?php
if(@$_GET['q']==4 && !(@$_GET['step']) ) {
echo '<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
   <select id="branch" name="branch" placeholder="Select Branch" class="form-control input-md" >
   <option value="">Select Branch</option>
  <option value="cse">Computer Science</option>
  <option value="mech">Mechanical</option>
  <option value="elec">Electrical</option>
  <option value="hmct">Hotel Management</option>
  <option value="civil">Civil</option>
  <option value="it">Information Technology</option>
   </select>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <select id="sem" name="sem" placeholder="Select Semester" class="form-control input-md" >
  <option value="">Select Semester</option>
   <option value="1">Semester First</option>
  <option value="2">Semester Second</option>
  <option value="3"> Semester Third</option>
  <option value="4">Semester Fourth</option>
  <option value="5">Semester Fifth</option>
  <option value="6">Semester Sixth</option>
   </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="desc"></label>  
  <div class="col-md-12">
  <textarea rows="4" cols="4" name="desc" class="form-control" placeholder="Write description here..."></textarea>  
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?>

<?php
if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
<fieldset>
';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question '.$i.'</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />'; 
 }
    
echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?>

<?php if(@$_GET['q']==5) {

$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
	$eid = $row['eid'];
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
}
$c=0;
echo '</table></div></div>';

}
?>

<?php if(@$_GET['q']==7) {
echo '

<div class="col-md-7"></div>
<div class="col-md-4 panel">  
  <form class="form-horizontal" name="form" action="staff.php?q=dash.php?q=8" onSubmit="return validateForm()" method="POST">
<fieldset>

<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter Name" class="form-control input-md" type="text">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label title1" for="email"></label>
  <div class="col-md-12">
    <input id="email" name="email" placeholder="Enter Email" class="form-control input-md" type="email">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="gender"></label>
  <div class="col-md-12">
    <select id="gender" name="gender" placeholder="Select Gender" class="form-control input-md" >
   <option value="Male">Select Gender</option>
  <option value="Male">Male</option>
  <option value="Female">Female</option> </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="mobile"></label>  
  <div class="col-md-12">
  <input id="mobile" name="mobile" placeholder="Enter Contact Number" class="form-control input-md" type="number">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <select id="branch" name="branch" placeholder="Select Branch" class="form-control input-md" >
   <option value="">Select Branch</option>
  <option value="cse">Computer Science</option>
  <option value="mech">Mechanical</option>
  <option value="elec">Electrical</option>
  <option value="hmct">Hotel Management</option>
  <option value="civil">Civil</option>
   <option value="it">Information technology</option>
   </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="password"></label>
  <div class="col-md-12">
    <input id="password" name="password" placeholder="Enter Password" class="form-control input-md" type="password">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12control-label" for="cpassword"></label>
  <div class="col-md-12">
    <input id="cpassword" name="cpassword" placeholder="Re-Enter Password" class="form-control input-md" type="password">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 

    <input type="submit" class="sub" value="Submit Information" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form>
</div>
</div></div>
</div>
 </div>';
}
?>

</div>
</div></div>
</body>
</html>
