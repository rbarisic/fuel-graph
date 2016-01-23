$(document).on('ready', function() {
	var load = function() {
		$("a.more").on('click', addInputPrice);
		addInputPrice(); // create an initial input element.
		addInputPrice(); // create a 2nd initial input element.
	};

	var addInputPrice = function() {
		var numInputs = $("input.price").length;
		if(numInputs > 9) { return 0; }

		var container = $('<div class="price-field"></div>');

		var inputPrice = $('<input class="price" type="number" step="any" min="0" placeholder="1.20">');

		inputPrice.prop('id', numInputs+1);

		container.append($('<span>Preis #'+(numInputs+1)+'</span>'));
		container.append(inputPrice);
		if(numInputs > 0) {
			container.append($('<button class="pure-button"><i class="fa fa-fw fa-close"></i></button>').click(
				function(event) {
					event.preventDefault();
					$(this).parent().fadeOut(200, function() { $(this).remove() });
				}
			));
		}

		$("div.price-values").append(container);
	}

	var parseRange = function() {

	}

	var graph = Morris.Line({
		element: 'fuel-graph',
		data: [{
			y: '0',
			x: '0',
			a: 0
		}, {
			y: '1',
			x: '1',
			a: 1
		}],
	    parseTime: false,
		xkey: 'x',
		ykeys: ['a'],
		labels: ['A']
	});

	var updateGraph = function() {
		var reach = $("input#fuel-range").val();
		var expenditure = $("input#fuel-expenditure").val();
		var currency = $("select#currency option:selected").text();

		$("div#fuel-graph").html('');
		values = [];
		prices = $("input.price");

		var ykeys = [];
		var labels = [];

		var left = {};
		left['x'] = "0";

		var right = {};
		right['x'] = $("#fuel-range").val() // parse sane range, please

		prices.each(function(index, key) {
			var key = $(key);

			ykeys.push(key.prop('id'));
			labels.push("Preis #"+key.prop('id'));

			left[key.prop('id')] = 0
			right[key.prop('id')] = calculate(reach, expenditure, key.val())

		});

		values.push(left);
		values.push(right);

		Morris.Line({
			element: 'fuel-graph',
			data: values,
			parseTime: false,
			xkey: 'x',
			ykeys: ykeys,
			labels: labels,
			xLabelFormat: function(x) { return "Preis bei " + x.label + 'km' },
			yLabelFormat: function(y) { return y.toFixed(2) + ' ' + currency },
			smooth: false,
			postUnits: ' ' + currency
		});
	}

	// Calculate the Car's Fuel Consumption
	// Total Reach
	// Expenditure per 100km
	// Price per Liter Fuel
	var calculate = function(reach, expenditure, price) {
		return (reach / 100) * expenditure * price;
	}

	$(window).on('change keyup click', updateGraph);
	$(window).resize(updateGraph);

	load();
})

// Benzinpreis: 1.20
// Reichweite: 20000
// Verbrauch: 9

// x = 20000
// (20000 / 100) * 9 * 1.20
// 
// 