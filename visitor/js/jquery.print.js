<--- --------------------------------------------------------------------------------------- ----
	
	Blog Entry:
	Ask Ben: Print Part Of A Web Page With jQuery
	
	Author:
	Ben Nadel / Kinky Solutions
	
	Link:
	http://www.bennadel.com/index.cfm?event=blog.view&id=1591
	
	Date Posted:
	May 21, 2009 at 9:10 PM
	
---- --------------------------------------------------------------------------------------- --->


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>Print Part of a Page With jQuery</title>
	<script type="text/javascript" src="jquery-1.3.2.js"></script>
	<script type="text/javascript" src="jquery.print.js"></script>
	<script type="text/javascript">
 
		// When the document is ready, initialize the link so
		// that when it is clicked, the printable area of the
		// page will print.
		$(
			function(){
 
				// Hook up the print link.
				$( "a" )
					.attr( "href", "javascript:void( 0 )" )
					.click(
						function(){
							// Print the DIV.
							$( ".printable" ).print();
 
							// Cancel click event.
							return( false );
						}
						)
				;
 
			}
			);
 
	</script>
 
	<style type="text/css">
 
		body {
			font-family: verdana ;
			font-size: 14px ;
			}
 
		h1 {
			font-size: 180% ;
			}
 
		h2 {
			border-bottom: 1px solid #999999 ;
			}
 
		.printable {
			border: 1px dotted #CCCCCC ;
			padding: 10px 10px 10px 10px ;
			}
 
		img {
			background-color: #E0E0E0 ;
			border: 1px solid #666666 ;
			padding: 5px 5px 5px 5px ;
			}
 
		a {
			color: red ;
			}
 
	</style>
</head>
<body>
 
	<h1>
		Print Part of a Page With jQuery
	</h1>
 
	<p>
		<a>Print Bio</a>
	</p>
 
	<div class="printable">
 
		<h2>
			Jen Rish
		</h2>
 
		<p>
			Jen Rish, upcoming fitness and figure model has some
			crazy developed legs!
		</p>
 
		<p>
			<img
				src="jen_rish_crazy_legs.jpg"
				width="380"
				height="570"
				alt="Jen Rish Has Amazing Legs!"
				/>
		</p>
 
		<p>
			I bet she does some <strong>serious squatting</strong>!
		</p>
 
	</div>
 
</body>
</html>