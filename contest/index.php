<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>THE CHALLENGE!</title>
<SCRIPT LANGUAGE="JavaScript" SRC="jquery-2.1.1.min.js"></script>
<SCRIPT LANGUAGE="JavaScript" SRC="jscripts.js"></script>
<link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
<style type="text/css">
html
{
  margin:0;
  padding:0;
  background: url("fond-hpe.jpg") no-repeat center fixed; 
  -webkit-background-size: cover; /* pour Chrome et Safari */
  -moz-background-size: cover; /* pour Firefox */
  -o-background-size: cover; /* pour Opera */
  background-size: cover; /* version standardisée */
  font-family:Georgia, "Times New Roman", Times, serif;
  text-shadow: 2px 2px 2px black;
}

.LogoContest
{
	position:fixed;
	top:2%;
	right:2%;
}

.lost
{
	background-image:url(lost.png);
	background-repeat:no-repeat;
	background-position:center;
	background-size:contain;
	margin:0px;
	height:30%;
	width:17%;
	float:left;
}

.lost p
{
	color:white;
	font-size:2.0vw;
	padding-top:30%;
	padding-left:5px;
	text-align:center;
}

.error
{
	background-image:url(error.png);
	background-repeat:no-repeat;
	background-position:center;
	background-size:contain;
	margin:0px;
	height:30%;
	width:17%;
	float:left;
}

.error p
{
	color:white;
	font-size:2.0vw;
	padding-top:30%;
	padding-left:5px;
	text-align:center;
}

.win
{
	font-family: 'Russo One', cursive;
	background-image:url(win.png);
	background-repeat:no-repeat;
	background-position:top;
	background-size:contain;
	height:30%;
	width:20%;
	margin:0px;
	float:left;
}

.win p
{
	font-family: 'Russo One', cursive;
	color:white;
	font-size:2.5vw;
	padding-top:20%;
	padding-left:0px;
	text-align:center;
}

.content
{
	font-size:90px;
	color:#666;
	font-family: 'Russo One', cursive;
	position:fixed;
	top:30%;
	left:10%;
	height:100%;
	width:100%;
}
</style>
</head>
<body>

<script type="text/javascript">
$(document).ready(function () {
	InitGroups();
	
	setInterval(function(){
	DisplayGroups();
	}, 8000);		
	
});
</script>
<div id="content" class="content"></div>
</body>
</html>