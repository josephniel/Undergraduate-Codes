<%@page language="java" contentType="text/html" pageEncoding="UTF-8" import="java.util.*" %>

<!doctype>
<html>
	<head>
		<title>Flip Flop Function Tabulator</title>
		
		<link rel='stylesheet' href='./css/normalize.css' />
		<link rel='stylesheet' href='./css/main.css' />
		
	</head>
	<body>
		<center id='container'>
		<form id='form' method='get' action='tabulate.jsp'>
		
			<div id='first' class='innerContainer'>
				<div class='innermost'>
					<div class='screen'>
						<span class='table-cell'>
							<h1>Flip Flop Function Tabulator</h1>
							<h2>Machine Problem by Evangeline Louise Carandang and Joseph Niel Tuazon</h2>
							<div class='margin'></div>
							<span class='button'>Start</span>
						</span>
					</div>
				</div>
			</div>
			
			<div id='second' class='innerContainer'>
				<div class='innermost'>
					<div class='screen'>
						<span class='table-cell'>
							<h3>Number of Input(s)</h3>
							<h4><label for='r1'>One (1)<label> &nbsp;&nbsp;&nbsp;&nbsp; <input id='r1' type='radio' name='numberOfInput' value='1' /> </h4>
							<h4><label for='r2'>Two (2)<label> &nbsp;&nbsp;&nbsp;&nbsp; <input id='r2' type='radio' name='numberOfInput' value='2' /> </h4>
							<div class='margin'></div>
							<span class='button'>Next</span>
						</span>
					</div>
				</div>
			</div>
			
			<div id='third' class='innerContainer'>
				<div class='innermost'>
					<div class='screen'>
						<span class='table-cell'>
							<h3>Select flip-flop function</h3>
							<div style='display:table'>
								<select name='flipFlopType' style='display:table-cell;vertical-align:middle'>
									<option value='-'>-</option>
									<option value='d'>D Flip-flop</option>
									<option value='t'>T Flip-flop</option>
									<option value='rs'>RS Flip-Flop</option>
									<option value='jk'>JK Flip-Flop</option>
								</select>
								<span class='x2'>x2</span>
							</div>
							<div class='margin'></div>
							<span id='add' class='button'>Add</span> &nbsp;&nbsp;&nbsp;&nbsp;
							<span id='next' class='button'>Next</span>
						</span>
					</div>
				</div>
			</div>
			
			<div id='fourth' class='innerContainer'>
				<div class='innermost'>
					<div class='screen'>
						<span class='table-cell'>
							<h3></h3>
							<div id='functions'></div>
							<div class='margin'></div>
							<span class='button'>Next</span>
						</span>
					</div>
				</div>
			</div>
			
			<div id='fifth' class='innerContainer'>
				<div class='innermost'>
					<div class='screen'>
						<span class='table-cell'>
							<h3>Include an output?</h3>
							<h4><label for='r11'>Yes<label> &nbsp;&nbsp;&nbsp;&nbsp; <input id='r11' type='radio' name='addOutput' value='1' /> </h4>
							<h4><label for='r21'>No<label> &nbsp;&nbsp;&nbsp;&nbsp; <input id='r21' type='radio' name='addOutput' value='0' /> </h4>
							<div id='outputFunctionContainer'>
								<div class='margin'></div>
								<h4 style='text-align:left'>Output function:</h4>
							</div>
							<div class='margin'></div>
							<input type='submit' value='Submit' class='button' />
						</span>
					</div>
				</div>
			</div>
			
		</form>
		</center>
		
		<script type='text/javascript' src='./js/jquery.js'></script>
		<script type='text/javascript' src='./js/main.js'></script>
		
	</body>
</html>