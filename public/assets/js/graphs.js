$(document).ready(function() {

	var options = {
	    //Boolean - Whether we should show a stroke on each segment
	    segmentShowStroke : true,

	    //String - The colour of each segment stroke
	    segmentStrokeColor : "#fff",

	    //Number - The width of each segment stroke
	    segmentStrokeWidth : 2,

	    //Number - The percentage of the chart that we cut out of the middle
	    percentageInnerCutout : 50, // This is 0 for Pie charts

	    //Number - Amount of animation steps
	    animationSteps : 100,

	    //String - Animation easing effect
	    animationEasing : "easeOutBounce",

	    //Boolean - Whether we animate the rotation of the Doughnut
	    animateRotate : true,

	    //Boolean - Whether we animate scaling the Doughnut from the centre
	    animateScale : false,

	    //String - A legend template
	    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
	};

	var context_0 = $('#results-graph_0').get(0).getContext('2d');
	var context_1 = $('#results-graph_1').get(0).getContext('2d');
	var context_2 = $('#results-graph_2').get(0).getContext('2d');

	var totalData, attemptedData, passedData = [];
	
	$.ajax({
		url: Equality.url,
		type: 'GET',
		data: {},
		success: function(data) {

			console.log(data);

			totalData = [{
				value: data['all_users'] - data['active_users'],
				label: 'Invited Users',
				color: '#556270',
				highlight: '#512BC7'
			},
			{
				value: data['active_users'],
				label: 'Active Users',
				color: '#1693A5',
				highlight: '#A171CA'
			}];
			attemptedData = [{
				value: data['active_users'] - data['attempted'],
				label: 'Not Attempted',
				color: '#C44D58',
				highlight: '#CC51A9'
				
			},
			{
				value: data['attempted'],
				label: 'Attempted Test',
				color: '#1693A5',
				highlight: '#A171CA'
			}];
			passedData = [{
				value: data['attempted'] - data['passed'],
				label: 'Failed Test',
				color: '#3384BB',
				highlight: '#3B94CF'
			},
			{
				value: data['passed'],
				label: 'Passed Test',
				color: '#1693A5',
				highlight: '#A171CA'
			}];

			var graphTotal = new Chart(context_0).Pie(totalData, options);
			var graphAttempted = new Chart(context_1).Pie(attemptedData, options);
			var graphPassed = new Chart(context_2).Pie(passedData, options);
		}
		
	});



})