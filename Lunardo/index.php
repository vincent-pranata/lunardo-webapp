<?php
	include 'tools.php';
	if(!empty($_POST)){
		if(validation()===true){
			session_start();	
			$_SESSION['cart']=$_POST;
			//to receipt page
			header("Location: receipt.php");
		}
		else{
			echo "<script language='javascript'>";
			echo "function FocusOnBottom() { document.getElementById('form').focus();}";
			echo FocusOnBottom();
			echo "</script>";
			
		}
	}
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment 4</title>
    
    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css">
    <script src='../wireframe.js'></script>
	<script src='script.js'></script>
  </head>

  <body>
	<header>
		<img src="../../media/lunardo.png">
		<h1> Lunardo </h1>
	</header>
	<nav id="menu">
		<ul>
			<li> <a href="#aboutus"> About Us </a></li>
			<li> <a href="#pricetable"> Price</a></li>
			<li> <a href="#showingTime"> Now Showing </a>
				<ul>
					<li> <a href="#ACT" class="ACT"> Avengers </a></li>
					<li> <a href="#RMC" class="RMC"> Top End Wedding </a></li>
					<li> <a href="#ANM" class="ANM"> Dumbo </a></li>
					<li> <a href="#AHF" class="AHF"> The Happy Prince </a></li>
				</ul>
			</li>

		</ul>	
	</nav>
	<div id='wrapper'>
		<main class='article'>
			<section id='aboutus'>
				<br>
				<h1>Lunardo has reopened !!!</h1>
				<p>Hello to all Lunardo's customers! The cinema has been reopened after a long renovation. Now our theaters are equipped with a number of extensive improvements such as two new types seats and also upgraded projection and sound system.Those improvements could let you step into another reality and surrender to the story of the movie that you're enjoying. What are you waiting for?! Come and get your ticket now to experience a new watching sensation.</p>

				<div class='seat'>
					<div id='info'>
						<h1>New seats are now avaliable!<br>
						Get the experience of watching movies with the new standard seat and reclinable first class seat</h1>
						<div id='standardSeat'>
							<img src="../../media/standardseat.png" alt='Standard seat picture'/>
							<p><i>Standard Seat</i></p>
						</div>

						<div id='firstSeat'>
							<img src="../../media/firstseat.png" alt='first seat picture'/>
							<p><i>First Class Seat</i></p>
						</div>
					</div>
					<div id='infodescription'>
						<h1>The Total Cinema Experience</h1>
						<p>Dolby Cinema is designed from the ground up to provide the best sound, picture, and environment for any movie — letting you step into another reality and surrender to the story.</p>
						<ul>
							<li>
								<h2>Dramatic Imaging</h2>
								<p>Dolby Vision™ was designed for the cinema to deliver incredible color, a million-to-one contrast ratio, and twice the brightness of standard screens. Powered by dual-laser projection technology and engineered for a consistent experience, Dolby Vision lets you see more of the story.</p>
							</li>
							<li>
								<h2>Moving Audio</h2>
								<p>Dolby Atmos® is an industry-leading audio technology that delivers powerful, moving audio that flows all around you, even from above and behind. Up to 128 individual sounds can be precisely placed and moved throughout the cinema with lifelike depth, detail, and clarity, putting you at the center of the story.</p>
							</li>
							<li>
								<h2>Innovative Seating</h2>
								<p>Premium seats are ergonomically designed for maximum comfort and clear sight lines, giving you a great perspective on 2D and 3D action. And because you can reserve your seats ahead of time, you can get your favorite spot in the house, whether it's just for you, your family, or group of friends.</p>
							</li>
						</ul> 
					</div>
				</div>
			</section>

			<section id='pricetable'>
				<br>
				<h1>Price Table</h1>
				<table>
					<tr>
						<th>Seat Type</th>
						<th>Discount</th>
						<th>Non-Discount</th>
					</tr>
					<tr>
						<td id='STA'>Standard Adult</td>
						<td>14.00</td>
						<td>19.80</td>
					</tr>
					<tr>
						<td id='STP'>Standard Concession</td>
						<td>12.50</td>
						<td>17.50</td>
					</tr>
					<tr>
						<td id='STC'>Standard Child</td>
						<td>11.00</td>
						<td>15.30</td>
					</tr>
					<tr>
						<td id='FCA'>First Class Adult</td>
						<td>24.00</td>
						<td>30.00</td>
					</tr>
					<tr>
						<td id='FCP'>First Class Concession</td>
						<td>22.50</td>
						<td>27.00</td>
					</tr>
					<tr>
						<td id='FCC'>First Class Child</td>
						<td>21.00</td>
						<td>24.00</td>
					</tr>
				</table>
				<ul> Discount Time
					<li> All day Monday and Wednesday </li>
					<li> 12pm on Weekdays </li>
				</ul>
			</section>
			
			<section id='showingTime'>
				<br>
				<h1>Now Showing</h1>	
				<div id='movielist'>
					<div id='ACT'>
						<br>
						<img src='../../media/avengers.png'/>
						<div class='movieinfo'>
							<h1>Avengers End Game<br>PG</h1>
							<table>
								<tr>
									<th>Day</th	>
									<th>Time</th>
								</tr>
								<tr>
									<td>Monday</td>
									<td>None</td>
								</tr>
								<tr>
									<td>Tuesday</td>
									<td>None</td>
								</tr>
								<tr>
									<td>Wednesday</td>
									<td>21:00</td>
								</tr>
								<tr>
									<td>Thursday</td>
									<td>21:00</td>
								</tr>
								<tr>
									<td>Friday</td>
									<td>21:00</td>
								</tr>
								<tr>
									<td>Saturday</td>
									<td>18:00</td>
								</tr>
								<tr>
									<td>Sunday</td>
									<td>18:00</td>
								</tr>
							</table>
						</div>
					</div>	
					<div id='RMC'>
						<br>
						<img src='../../media/tew.png'/>
						<div class='movieinfo'>
							<h1>Top End Wedding<br>G</h1>
							<table>
								<tr>
									<th>Day</th>
									<th>Time</th>
								</tr>
								
								<tr>
									<td>Monday</td>
									<td>18:00</td>
								</tr>
								<tr>
									<td>Tuesday</td>
									<td>18:00</td>
								</tr>
								<tr>
									<td>Wednesday</td>
									<td>None</td>
								</tr>
								<tr>
									<td>Thursday</td>
									<td>None</td>
								</tr>
								<tr>
									<td>Friday</td>
									<td>None</td>
								</tr>
								<tr>
									<td>Saturday</td>
									<td>15:00</td>
								</tr>
								<tr>
									<td>Sunday</td>
									<td>15:00</td>
								</tr>
							</table>
						</div>
					</div>	
					<div id='ANM'>
						<br>
						<img src='../../media/Dumbo.png '/>
						<div class='movieinfo'>
							<h1>Dumbo<br>G</h1>
							<table>
								<tr>
									<th>Day</th>
									<th>Time</th>
								</tr>
								<tr>
									<td>Monday</td>
									<td>12:00</td>
								</tr>
								<tr>
									<td>Tuesday</td>
									<td>12:00</td>
								</tr>	
								<tr>
									<td>Wednesday</td>
									<td>18:00</td>
								</tr>
								<tr>
									<td>Thursday</td>
									<td>18:00</td>
								</tr>
								<tr>
									<td>Friday</td>
									<td>18:00</td>
								</tr>
								<tr>
									<td>Saturday</td>
									<td>12:00</td>
								</tr>
								<tr>
									<td>Sunday</td>
									<td>12:00</td>
								</tr>
							</table>
						</div>
					</div>	
					<div id='AHF'>
						<br>
						<img src='../../media/thp.jpg '/>
						<div class='movieinfo'>
							<h1>The Happy Prince<br>G</h1>
							<table>
								<tr>
									<th>Day</th	>
									<th>Time</th>
								</tr>								
								<tr>
									<td>Monday</td>
									<td>None</td>
								</tr>
								<tr>
									<td>Tuesday</td>
									<td>None</td>
								</tr>	
								<tr>
									<td>Wednesday</td>
									<td>12:00</td>
								</tr>
								<tr>
									<td>Thursday</td>
									<td>12:00</td>
								</tr>
								<tr>
									<td>Friday</td>
									<td>12:00</td>
								</tr>
								<tr>
									<td>Saturday</td>
									<td>21:00</td>
								</tr>
								<tr>
									<td>Sunday</td>
									<td>21:00</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			
				<article id='synopsis'>
					<h1>Synopsis</h1>
					<div id='ACTsynopsis'>
						<div class='description'>
							<h2 class='title'>Avengers End Game</h2>
							<h2 class='rating'>PG</h2>
							<p class='summary'>Adrift in space with no food or water, Tony Stark sends a message to Pepper Potts as his oxygen supply starts to dwindle. Meanwhile, the remaining Avengers -- Thor, Black Widow, Captain America and Bruce Banner -- must figure out a way to bring back their vanquished allies for an epic showdown with Thanos -- the evil demigod who decimated the planet and the universe.</p>							
						</div>
						<div class='video'>
							<iframe class='theVideo' src="https://www.youtube.com/embed/TcMBFSGVi1c" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
							
						<div class='booking'><br>Make a Booking <br>
							<button class='ACT' name='WED' value='T21' type="button">Wednesday 21:00</button>
							<button class='ACT' name='THU' value='T21' type="button">Thursday  21:00</button>
							<button class='ACT' name='FRI' value='T21' type="button">Friday    21:00</button>
							<button class='ACT' name='SAT' value='T18' type="button">Saturday  18:00</button>
							<button class='ACT' name='SUN' value='T18' type="button">Sunday    18:00</button>
						</div>
					</div>
					
					<div id='RMCsynopsis'>
						<div class='description'>
							<h2 class='title'>Top End Wedding</h2>
							<h2 class='rating'>G</h2>
							<p class='summary'>Lauren and Ned are engaged, they are in love, and they have just ten days to find Lauren's mother who has gone AWOL somewhere in the remote far north of Australia, reunite her parents and pull off their dream wedding.</p>							
						</div>
						<div class='video'>
							<iframe class='theVideo' src="https://www.youtube.com/embed/uoDBvGF9pPU" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
							
						<div class='booking'><br>Make a Booking <br>
							<button class='RMC' name='MON' value='T18' type="button">Monday 	 18:00</button>
							<button class='RMC' name='TUE' value='T18' type="button">Tuesday   18:00</button>
							<button class='RMC' name='FRI' value='T15' type="button">Friday    15:00</button>
							<button class='RMC' name='SAT' value='T15' type="button">Saturday  15:00</button>
						</div>
					</div>

					<div id='ANMsynopsis'>
						<div class='description'>
							<h2 class='title'>Dumbo</h2>
							<h2 class='rating'>G</h2>
							<p class='summary'>Struggling circus owner Max Medici enlists a former star and his two children to care for Dumbo, a baby elephant born with oversized ears. When the family discovers that the animal can fly, it soon becomes the main attraction -- bringing in huge audiences and revitalizing the run-down circus. The elephant's magical ability also draws the attention of V.A. Vandevere, an entrepreneur who wants to showcase Dumbo in his latest, larger-than-life entertainment venture.</p>							
						</div>
						<div class='video'>
							<iframe class='theVideo' src="https://www.youtube.com/embed/7NiYVoqBt-8" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
							
						<div class='booking'><br>Make a Booking <br>
							<button class='ANM' name='MON' value='T12' type="button">Monday	 12:00</button>
							<button class='ANM' name='TUE' value='T12' type="button">Tuesday   12:00</button>
							<button class='ANM' name='WED' value='T18' type="button">Wednesday 18:00</button>
							<button class='ANM' name='THU' value='T18' type="button">Thursday  18:00</button>
							<button class='ANM' name='FRI' value='T18' type="button">Friday    18:00</button>
							<button class='ANM' name='SAT' value='T12' type="button">Saturday  12:00</button>
							<button class='ANM' name='SUN' value='T12' type="button">Sunday    12:00</button>
						</div>
					</div>

					<div id='AHFsynopsis'>
						<div class='description'>
							<h2 class='title'>The Happy Prince</h2>
							<h2 class='rating'>G</h2>
							<p class='summary'>His body ailing, Oscar Wilde lives out his last days in exile, observing the difficulties and failures surrounding him with ironic detachment, humour, and the wit that defined his life.</p>							
						</div>
						<div class='video'>
							<iframe class='theVideo' src="https://www.youtube.com/embed/4HmN9r1Fcr8" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
							
						<div class='booking'><br>Make a Booking <br>
							<button class='AHF' name='WED' value='T12' type="button">Wednesday 12:00</button>
							<button class='AHF' name='THU' value='T12' type="button">Thursday  12:00</button>
							<button class='AHF' name='FRI' value='T12' type="button">Friday    12:00</button>
							<button class='AHF' name='SAT' value='T21' type="button">Saturday  21:00</button>
							<button class='AHF' name='SUN' value='T21' type="button">Sunday    21:00</button>
						</div>
					</div>
				</article>

				<!-- <form id='form' action="https://titan.csit.rmit.edu.au/~e54061/wp/lunardo-formtest.php " method="post" onsubmit="return validation()"> -->
				<form id='form' action="index.php" method="post" onsubmit="return validation()">
				<!-- <form id='form' action="" method="post" onsubmit="return validation()"> -->
				<!-- <form id='form' action="processing.php" method="post" onsubmit="return validation()"> -->
					<fieldset id='bookingDetail'>
						<label></label>
						<input type=hidden name='movie[id]' value="">
						<label></label>
						<input type=hidden name='movie[day]'value="">
						<label></label>
						<input type=hidden name='movie[hour]' value="">
					</fieldset>
					<div class='form'>
						<fieldset id='standard'>
							<legend>Standard</legend>
							<fieldset>
								<label> Adult </label>
								<select name='seats[STA]' id='seats-STA'>
									<option value=0>Please Select</option>
									<option value=1>1</option>
									<option value=2>2</option>
									<option value=3>3</option>
									<option value=4>4</option>
									<option value=5>5</option>
									<option value=6>6</option>
									<option value=7>7</option>
									<option value=8>8</option>
									<option value=9>9</option>
									<option value=10>10</option>
								</select>
							</fieldset>
							<fieldset>
								<label> Concession </label>
								<select name='seats[STP]' id='seats-STP'>
									<option value=0>Please Select</option>
									<option value=1>1</option>
									<option value=2>2</option>
									<option value=3>3</option>
									<option value=4>4</option>
									<option value=5>5</option>
									<option value=6>6</option>
									<option value=7>7</option>
									<option value=8>8</option>
									<option value=9>9</option>
									<option value=10>10</option>
								</select>
							</fieldset>
							<fieldset>
								<label>Child</label>
								<select name='seats[STC]' id='seats-STC'>
									<option value=0>Please Select</option>
									<option value=1>1</option>
									<option value=2>2</option>
									<option value=3>3</option>
									<option value=4>4</option>
									<option value=5>5</option>
									<option value=6>6</option>
									<option value=7>7</option>
									<option value=8>8</option>
									<option value=9>9</option>
									<option value=10>10</option>
								</select>
							</fieldset>
						</fieldset>

						<fieldset id='first'>
							<legend>First Class</legend>	
							<fieldset>
								<label>Adult</label>
								<select name='seats[FCA]' id='seats-FCA'>
									<option value=0>Please Select</option>
									<option value=1>1</option>
									<option value=2>2</option>
									<option value=3>3</option>
									<option value=4>4</option>
									<option value=5>5</option>
									<option value=6>6</option>
									<option value=7>7</option>
									<option value=8>8</option>
									<option value=9>9</option>
									<option value=10>10</option>
								</select>
							</fieldset>

							<fieldset>
								<label>Concession</label>
								<select name='seats[FCP]' id='seats-FCP'>
									<option value=0>Please Select</option>
									<option value=1>1</option>
									<option value=2>2</option>
									<option value=3>3</option>
									<option value=4>4</option>
									<option value=5>5</option>
									<option value=6>6</option>
									<option value=7>7</option>
									<option value=8>8</option>
									<option value=9>9</option>
									<option value=10>10</option>
								</select>
							</fieldset>

							<fieldset>
								<label>Child</label>
								<select name='seats[FCC]' id='seats-FCC'>
									<option value=0>Please Select</option>
									<option value=1>1</option>
									<option value=2>2</option>
									<option value=3>3</option>
									<option value=4>4</option>
									<option value=5>5</option>
									<option value=6>6</option>
									<option value=7>7</option>
									<option value=8>8</option>
									<option value=9>9</option>
									<option value=10>10</option>
								</select>
							</fieldset>
						</fieldset>
						<p id="totalCost"> Total $<span id='cost'>0.00</span></p>
					</div>

					<div class='form' id='rightForm'>
						<fieldset id='customerDetail'>
							<fieldset>
								<label>Name</label>
								<input type="text" name=cust[name] required>
							</fieldset>
							<fieldset>
								<label>E-mail</label>
								<input type="email" name=cust[email] required>
							</fieldset>
							<fieldset>
								<label>Mobile</label>
								<input type="tel" id='phone' placeholder='04... or +614..' name=cust[mobile]  required>
					
							</fieldset>
							<fieldset>
								<label>Credit card</label>
								<input type="tel" id='credit-card' name=cust[card] required>
		
							</fieldset>
							<fieldset>
								<label>Expiry</label>
								<select name="cust[expiryMonth] ">
									<option value="01">January</option>
									<option value="02">February </option>
									<option value="03">March</option>
									<option value="04">April</option>
									<option value="05">May</option>
									<option value="06">June</option>
									<option value="07">July</option>
									<option value="08">August</option>
									<option value="09">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
								</select>
								<select name="cust[expiryYear]">
									<option value="19"> 2019</option>
									<option value="20"> 2020</option>
									<option value="21"> 2021</option>
									<option value="22"> 2022</option>
									<option value="23"> 2023</option>
									<option value="24"> 2024</option>
								</select>
							</fieldset>
							<fieldset>
							<input type='submit' name='session-reset' value='Reset the session' >
							<input type="submit" value="Order">
						</fieldset>
					</div>
				</form>
			</section>
		</main>

		<footer>
			<div>&copy;<script>
			document.write(new Date().getFullYear());
			</script>Vincent Pranata/ s3665858, Guoxin Shan/ s3641701 and Fantastic 2. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
			<div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
			<div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
			<?php
				include_once 'tools.php';
				echo "<pre>\nPOST: </pre>";		
				preShow($_POST,false);
			?>
		</footer>
	</div>
	</body>
</html>
