<!DOCTYPE html>
<html lang="en">
<head>
  <title>Problem Specimen Work Queue</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="description" content="" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;1,600&display=swap" rel="stylesheet">

    <!-- Compiled and minified JavaScript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->
  <style type="text/css">
  	body {
  		margin:  0 auto;
  		font-family: Source Sans Pro, Helvetica, Arial, sans-serif;
  		font-size: 16px;
  	}
  	h2 {
  		font-size: 18px;
  		font-weight: 600;
  		margin: 0 0 0 .75rem;
  	}
  	nav {
  		width: 100%;
  		background: #DADCE0;
  		margin-bottom: 16px;
  		box-shadow: none;
  		position: fixed;
  		top: 0;
  		z-index: 99;
  	}

  	nav ul {
		list-style:  none;
		margin: 0;
	}
	nav li {
		display: inline-block;
		margin: 0 8px;
		padding: 16px 8px;
	}
	nav li a {
		color: #231f20;
	}
	main {
		margin-left: 64px;
		width: calc(100% - 64px - 236px);
		margin-top: 72px;
	}
	footer {
		background: #231f20;
		position: fixed;
		right: 220px;
		bottom: 0;
		left: 48px;
		/*width: 100%;*/
		color: #fff;
	}
	.call-controls {
		float: right !important;
	}
	#patient-search {
		background: #f2f2f2;
	}
	.copyright {
		padding: 4px 16px;
		font-size: 13px;
	}
	.action-bar {
		background: grey;
		padding: 16px;
	}
	.left-nav {
		position: fixed;
		left: 0;
		top: 64px;
		bottom: 0;
		height: calc(100% - 64px);
		width: 48px;
		border-right: 1px solid #dadce0;
		text-align: center;
	}
	.icon {
		width: 24px;
		height: 24px;
		margin: 16px auto;
		background: grey;
	}
	.right-sidebar {
		width: 220px;
		background: #f7f7f7;
		position: fixed;
		top: 64px;
		right: 0;
		bottom: 0;
		margin-bottom: 0;
	}
	.row {
		margin-bottom: 8px;
	}
	.sticky {
	  position: fixed;
	  top: 64px;
	  width: calc(100% - 64px - 236px);
	  z-index: 99;
	  background: #fafafa !important;
	  transition: all .3s;
	}
	.sticky.collapsible {
		margin: 0;
	}
	.sticky .collapsible-header {
		font-size: 14px;
		background: transparent;
		padding: .5rem .75rem;
		transition: all .3s;
	}
	.sticky .input-field {
		padding-top:  0;
		margin-top:  0;
	}
	.table th {
		font-size: 13px;
		font-weight: 400;
		padding: 8px 4px;
		color: #1A2188;
	}
	.table td {
		font-size: 14px;
		padding: 8px 4px;
	}
	.grid {
		width: 100%;
		height: 320px;
		/*background: #f0f0f0;*/
		border:  1px solid #dcdbdb;
		padding: 16px;
		margin: 16px auto;
	}
	label {
		color: #1a2188;
	}
	.flex-group {
		display: flex;
		flex-direction: row;
		margin: 16px auto;
	}
	.sticky .flex-group {
		margin: 8px auto;
		transition: all .3s;
	}
	.flex-data {
		display: flex;
		flex-wrap: wrap;
		flex-direction: column;
		flex-grow: 7;
	}
  </style>

    
</head>
<body>
  <nav>
  	<ul>
  		<li class="nav-item"><a href="">Inbound</a></li>
  		<li class="nav-item"><a href="">Outbound</a></li>
  		<li class="nav-item"><a href="">Follow Up</a></li>
  		<li class="nav-item"><a href="">Maintenance</a></li>
  	</ul>
  </nav>
    
  <main>
  	<div class="left-nav">
  		<div class="icon"></div>
  		<div class="icon"></div>
  		<div class="icon"></div>
  		<div class="icon"></div>
  	</div>
  	<div class="col xl17">
  	<h2>Call Controls</h2>
  		<form>
  			<div class="row">
		  		<div class="col l6">
		  			<div class="input-field col">
			  			<label for="status">Status</label>
				  		<input type="text" name="status" />
				  	</div>
				  	<div class="input-field col">
					  	<label for="next">Next Status</label>
					  	<input type="text" name="next" />
				  	</div>
				  	<div class="input-field col">
				  		<label for="caller">Caller Number</label>
				  		<input type="text" name="caller" />
				  	</div>
		  		</div>
			  	<div class="col call-controls">
			  		<div class="col">
				  		<a href="">Consult</a>
				  	</div>
				  	<div class="col">
				  		<a href="">Transfer</a>
				  	</div>
				  	<div class="col">
				  		<a href="">Hold</a>
				  	</div>
				  	<div class="col">
				  		<button class="waves-effect waves-light btn">Answer</button>
				  	</div>
				  </div>
		  	</div>
		</form>
	</div>
  	<div id="call-details">
  		<h2>Problem Specimens</h2>
  		<form>
  			<div class="row">
		  		<div class="">
		  			<h4>Account Name</h4>
		  			 <table class="table">
			        <thead>
			          <tr>
			              <th>Accession Number</th>
			              <th>Control Number</th>
			              <th>Specimen Age</th>
			              <th>Collection Date</th>
			              <th>Patient Name</th>
			              <th>Patient DOB</th>
			              <th>Problem Code</th>
			              <th>Call Attempts</th>
			          </tr>
			        </thead>

			        <tbody>
			          <tr>
			            <td>652399852</td>
			            <td>B2365984</td>
			            <td>4h</td>
			            <td>12/02/21 4:22 PM</td>
			            <td>John Doe</td>
			            <td>12/25/72</td>
			            <td>NTI</td>
			            <td>1</td>
			          </tr>
			          <tr>
			            <td>123654987</td>
			            <td>7752365-B</td>
			            <td>5h</td>
			            <td>12/1/21 11:25 AM</td>
			            <td>Susan Smith</td>
			            <td>09/09/1955</td>
			            <td>NTI</td>
			            <td>0</td>
			          </tr>
			          <tr>
			            <td>987654321</td>
			            <td>5525252</td>
			            <td>12h</td>
			            <td>12/1/21 10:12 AM</td>
			            <td>Wally Williams</td>
			            <td>05/15/2000</td>
			            <td>NTI</td>
			            <td>0</td>
			          </tr>
			        </tbody>
			      </table>
			  	</div>
		  	</div>
		</form>
  	</div>

  	<ul id="patient-details" class="collapsible row">
  		<div class="collapsible-header">Patient Details</div>
  		<div class="flex-group">
  			<div class="col flex-data">
		  		<label for="name">Name</label>
		  		<div>John Doe</div>
		  	</div>
		  	<div class="col flex-data">
		  		<label for="dob">Date of Birth</label>
		  		<div>12/25/72</div>
		  	</div>
		  	<div class="col flex-data">
		  		<label for="age">Age</label>
		  		<div>48</div>
		  	</div>
		  	<div class="col flex-data">
		  		<label for="gender">Gender</label>
		  		<div>Male</div>
		  	</div>
		  	<div class="col flex-data">
		  		<label for="patid">Patient ID</label>
		  		<div>45698712</div>
		  	</div>
		  	<div class="col flex-data">
		  		<label for="control">Control Number</label>
		  		<div>B011238597</div>
		  	</div>
		  	<div class="col flex-data">
		  		<label for="provider">Provider Name</label>
		  		<div>Park, S.</div>
		  	</div>
  		</div>
  	</ul>
  	<div>
  		<ul class="collapsible grid">
  			<li>
		      <div class="collapsible-header">Ordered Tests</div>
		      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
		    </li>
  		</ul>
  		<ul class="collapsible grid">
  			<li>
		      <div class="collapsible-header">Brother Info</div>
		      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
		    </li>
  		</ul>
  		<ul class="collapsible grid">
  			<li>
		      <div class="collapsible-header">Problem Codes</div>
		      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
		    </li>
  		</ul>
  		<ul class="collapsible grid">
  			<li>
		      <div class="collapsible-header">Agent Comments</div>
		      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
		    </li>
  		</ul>
  		<ul class="collapsible grid">
  			<li>
		      <div class="collapsible-header">Action</div>
		      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
		    </li>
  		</ul>

  	</div>
  	<p>&nbsp;</p>
  	<p>&nbsp;</p>
  	<p>&nbsp;</p>
  	<p>END</p>
  	<p>&nbsp;</p>
  	<p>&nbsp;</p>
  	<p>&nbsp;</p>
  </main>
  <div class="right-sidebar">
  	<p>Call Notes</p>
  </div>
  <footer>
  	<div class="action-bar">Action Bar</div>
  	<div class="copyright">Release Version</div>
  </footer>
</body>
<script type="text/javascript">
		// When the user scrolls the page, execute myFunction
		window.onscroll = function() {myFunction()};

		// Get the navbar
		var patientSearch = document.getElementById("patient-details");

		// Get the offset position of the navbar
		var sticky = patientSearch.offsetTop - 64;

		// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
		function myFunction() {
		  if (window.pageYOffset >= sticky) {
		    patientSearch.classList.add("sticky")
		  } else {
		    patientSearch.classList.remove("sticky");
		  }
		}
	</script>
</html>