Marissa


Search Drive

Drive
.
Folder Path
My Drive
CS Senior Design
Spring 2016
NEW 
Folders and views
My Drive
Shared with me
Google Photos
Recent
Starred
Trash
436 MB of 15 GB used
Upgrade storage
Get Drive for PC
Name
Owner
Last modified
File size

Sprints 2016
Courtney Campbell
Jan 26, 2016Courtney Campbell
�

Meeting 1
Courtney Campbell
Feb 2, 2016Courtney Campbell
�

homeStyle.css
Hannah Millea
Feb 11, 2016Hannah Millea
787 bytes

home.html
Hannah Millea
Feb 11, 2016Hannah Millea
2 KB

App Layout
me
Feb 9, 2016me
�



<!DOCTYPE html>
<html>
	<head>
		<title>Beehive Monitoring System</title>
		<link type="text/css" rel="stylesheet" href="/beehive/web/homeStyle.css"/>
	</head>
	<body>
		<div id="status">
			<p>Hive Status: <span style="color:green">Good</span></p>
		</div>
		<!--Banner-->
		<div><img src="http://beaconowasso.org/wp-content/uploads/2013/11/14003833_l-2000x200.jpg">
			<h1>Beehive Monitoring System</h1>
		</img></div>
		
		<!--Navigation bar-->
		<ul>
			<li><a href="/beehive/web/home.html">Home</a></li>
			<li><a href="/beehive/web/youHive.html">Your Hive</a></li>
		</ul>

		<!--Slide Show-->
		<SCRIPT LANGUAGE="JavaScript">
		var num=1
		img1 = new Image ()
		img1.src = "http://nationswell.com/wp-content/uploads/2014/06/school-behive.jpg"
		img2 = new Image ()
		img2.src = "https://upload.wikimedia.org/wikipedia/commons/9/92/Natural_Beehive_and_Honeycombs.jpg"
		img3 = new Image()
		img3.src = "http://4.bp.blogspot.com/-yYpc-bB1INw/U07cujbNEUI/AAAAAAAAAJY/8u-uFxm3IFs/s1600/_MG_1923.jpg"
		img4 = new Image()
		img4.src = "https://nineappletrees.files.wordpress.com/2014/07/beehive-entrance.gif"

		text1 = "Text for Picture One"
		text2 = "Text for Picture Two"
		text3 = "Text for Picture Three"
		text4 = "Text for Picture Four"		

		function slideshowUp()
		{
			num=num+1
			if (num==5)
				{num=1}
			document.mypic.src=eval("img"+num+".src")
			document.joe.burns.value=eval("text"+num)
		}

		function slideshowBack()
		{
			num=num-1
			if (num==0)
				{num=4}
			document.mypic.src=eval("img"+num+".src")
			document.joe.burns.value=eval("text"+num)
		}

		</SCRIPT>

		<!-- The Image and Form Codes are Below --> 
		<IMG SRC="http://nationswell.com/wp-content/uploads/2014/06/school-behive.jpg" NAME="mypic" BORDER=0 WIDTH="66%">
		<p>

		<FORM NAME="beehive">
		<INPUT TYPE="text" WIDTH="100" NAME="burns" VALUE="Text For Picture One">
		</FORM>

		<A HREF="JavaScript:slideshowBack()"> Back</A>
		<A HREF="JavaScript:slideshowUp()"> Next</A>

		<!--Notes-->
		<div id="notes">
		</div>
	</body>
</html>
