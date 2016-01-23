<html>
	<head>
		<!-- Config -->
		<meta charset="uft-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Erstelle eine Grafik, die dir dabei hilft, deine Spritkosten zu planen. Dieser Kostenlose Spritrechner kann mit bis zu 10 Spritpreisen gleichzeitig umgehen.">
		<title>Fuel-Graph - Benzinkosten und Spritpreise</title>
		<!-- Vendor -->
		<link rel="stylesheet" href="vendor/css/pure.0.6.min.css">
		<link rel="stylesheet" href="vendor/css/morris.css">
		<link rel="stylesheet" href="vendor/css/font-awesome.min.css">
		<script language="javascript" type="text/javascript" src="vendor/js/jquery-2.2.0.min.js"></script>
		<script language="javascript" type="text/javascript" src="vendor/js/raphael-2.1.2.min.js"></script>
		<script language="javascript" type="text/javascript" src="vendor/js/morris.min.js"></script>
		<script language="javascript" type="text/javascript" src="vendor/js/angular-1.4.min.js"></script>

		<!-- Assets -->
		<script language="javascript" type="text/javascript" src="assets/js/custom.js"></script>
		<link rel="stylesheet" href="assets/css/default.css">


		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="vendor/css/pure-grids-responsive-old-ie-min.css">
		<![endif]-->
		<!--[if gt IE 8]><!-->
		    <link rel="stylesheet" href="vendor/css/pure-grids-responsive.min.css">
		<!--<![endif]-->

		<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

	</head>

	<body>
		<div id="frame">
			<div class="header">
				<h1>Fuel Graph <small>0.1</small></h1>
			</div>
			<div class="container">
				<div class="info">
					<p>Fülle alle Felder aus, um herauszufinden, wieviel Geld du sparen kannst, wenn du günstiger tankst!</p>
				</div>
				
				<div class="pure-g">
			
					<div class="pure-u-1 pure-u-md-1">
						<div id="fuel-graph" style="height: 250px; position: relative;">
						</div>
					</div>

					<div class="pure-u-1 pure-u-md-1-2">
						<div class="l-box controls">
							<form class="pure-form form-reach">
								<h3>Reichweite und Verbrauch</h3>
								<label for="fuel-expenditure">Kraftstoffverbrauch in Litern</label>
								<input id="fuel-expenditure" type="number" step="any" min="0" placeholder='z.B. 9,6'>
								
								<br>

								<label for="fuel-range">Reichweite in Kilometern</label>
								<input id="fuel-range" type="number" step="any" min="0" placeholder='z.B. "30,000"'>
							</form>
						</div>
					</div>


					<div class="pure-u-1 pure-u-md-1-2">
						<div class="l-box controls">
							<form class="pure-form">
								<div class="graph-controls">
									<h3>Preise und Währung</h3>
									<div>
										<label for="currency">Währung</label>
										<select name="currency" id="currency">
											<option value="">EUR</option>
											<option value="">USD</option>
										</select>
									</div>

									<h4>Benzinpreise</h4>
									<div class="price-values">
									</div>
									
									<a class="more pure-button pure-button-primary"><i class="fa fa-fw fa-plus"></i></a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>