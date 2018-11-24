
var investmentBySharkData = {
	labels: ["Barbara", "Daymond", "Kevin", "Lori", "Mark", "Robert"],
	datasets: [
		   {
				label: 'Debt',
				backgroundColor: colorFour,
				data: [0, 0, 0, 0, 0, 0]
		   }, {
				label: 'Equity',
				backgroundColor: colorOne,
				data: [4, 6, 5, 11, 20, 5]
		   }, {
				label: 'Equity/Debt Mix',
				backgroundColor: colorThree,
				data: [0, 0, 1, 1, 0, 0]
		   }, {
				label: 'Equity/Royalty Mix',
				backgroundColor: colorTwo,
				data: [1, 0, 1, 2, 0, 0]
		   }, {
				label: 'Complete Buyout',
				backgroundColor: colorComp,
				data: [0, 0, 0, 0, 0, 1]
		   }
	]
	
};


var bubbleTooltips = function(tooltip) {
	if (!tooltip || !tooltip.dataPoints) {
		return;
	}
	
	var chart = window.investmentPerSeasonBubble.chart;
	//console.log(chart);
	var dataSetIndex = tooltip.dataPoints[0].datasetIndex;
	var dataIndex = tooltip.dataPoints[0].index;
	var label = chart.config.data.datasets[dataSetIndex].label;
	var data = chart.config.data.datasets[dataSetIndex].data[dataIndex];
	//tooltip.body[0].lines[0] = label;
	tooltip.body[0].lines.pop();
	tooltip.title.push(label);
	tooltip.displayColors = false;
	tooltip.footer.push("Total: $" + data.amt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
	var categories = data.categories;
	var catLen = categories.length;
	
	for (var i = 0 ; i < catLen; i++) {
		var cat = categories[i];
		if (cat.category && cat.total) {
			var line = cat.category + ": $"+ cat.total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			tooltip.body[0].lines.push(line);
		}
	}
	var height = tooltip.body[0].lines.length * (tooltip.bodyFontSize + 4)
		+ (tooltip.titleFontSize + tooltip.titleMarginBottom + tooltip.titleMarginBottom)
		+ (tooltip.footerFontSize + tooltip.footerMarginTop + tooltip.footerSpacing);
	tooltip.height = height;
	tooltip.width = 160;
	//console.log(tooltip);
	//console.log(data);
}

window.onload = function() {
	if (document.getElementById("investment-by-shark")) {
		var bySharkCTX = document.getElementById("investment-by-shark").getContext("2d");
		window.investmentBySharkChart = new Chart(bySharkCTX, {
			  type: 'bar',
			  data: investmentBySharkData,
			  options: {
				  title:{
					  display:true,
					  text:"Season 9 - Deal Type Mix"
				  },
				  tooltips: {
					  mode: 'index',
					  intersect: false
				  },
				  responsive: true,
				  scales: {
					  xAxes: [{
						  stacked: true,
					  }],
					  yAxes: [{
						  stacked: true
					  }]
				  }
			  }
	  });
	}
	
	if (document.getElementById("investment-by-type")) {
		var byTypeCTX = document.getElementById("investment-by-type").getContext("2d");
		window.dealTypePieChart = new Chart(byTypeCTX, {
			type: 'doughnut',
			options: {
				title:{
					display:true,
					text:"Season 9 - Deal Types"
				},
				responsive: true
			},
			data: dealTypeData
		});
	}
	
	if (document.getElementById("pitches-deals-category")) {
		var byTypeCTX = document.getElementById("pitches-deals-category").getContext("2d");
		window.dealPitchCatPieChart = new Chart(byTypeCTX, {
			type: 'doughnut',
			options: {
				cutoutPercentage: 50,
				title:{
					display:true,
					text:"Deals & Pitches by Category"
				},
				responsive: true,
					tooltips: {
						callbacks: {
							label: function(tooltipItem, data){
							//console.log(tooltipItem);
							//console.log(data);
							var dataset = data.datasets[tooltipItem.datasetIndex];
							var dataitem = dataset.data[tooltipItem.index];
							var type = dataset.label;
							var label = data.labels[tooltipItem.index];
							//console.log(dataitem);
							return  label + ' ' + type + ': ' + dataitem.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						}
					}
				}
			},
			data: categoryDealPitchData
		});
	}
	
	if (document.getElementById("investment-by-amt")) {
		var byAmtCTX = document.getElementById("investment-by-amt").getContext("2d");
		window.investAmtPieChart = new Chart(byAmtCTX, {
			 type: 'doughnut',
			 options: {
				 title:{
					 display:true,
					 text:"Season 9 - Shark Investment Totals"
				 },
				 responsive: true,
				 tooltips: {
					 callbacks: {
						 label: function(tooltipItem, data){
						 //console.log(tooltipItem);
						 //console.log(data);
						 var dataset = data.datasets[tooltipItem.datasetIndex];
						 var dataitem = dataset.data[tooltipItem.index];
						 var label = data.labels[tooltipItem.index];
						 //console.log(dataitem);
						 return  label + ': $' + dataitem.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						 }
					 }
				 }
			 },
			 data: investmentAmountData
		});
	}
	
	if (document.getElementById("investment-by-shark-per-season")) {
		var perSeasonCTX = document.getElementById("investment-by-shark-per-season").getContext("2d");
		window.investmentPerSeasonChart = new Chart(perSeasonCTX, {
			type: 'line',
			data: seasonBySeasonInvestmentData,
			options: {
				title: {
					display:true,
					text:"Season by Season Investment Totals"
				},
				tooltips: {
					mode: 'index',
					intersect: false,
					itemSort: function(a, b) {
						if (a.yLabel > b.yLabel) {
							return -1;
						} else if (b.yLabel > a.yLabel) {
							return 1
						}
						return 0;
					},
					callbacks: {
						label: function(tooltipItem, data){
						//console.log(tooltipItem);
						//console.log(data);
						var dataset = data.datasets[tooltipItem.datasetIndex];
						var dataitem = dataset.data[tooltipItem.index];
						var label = dataset.label;
						//console.log(dataitem);
						return  label + ': $' + dataitem.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						}
					}
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				responsive: true,
				scales: {
					xAxes: [{
						stacked: false
					}],
					yAxes: [{
						stacked: false,
						scaleLabel: {
							labelString: 'Amount Invested',
							display: true
						},
						ticks: {
							callback: function(value, index, values) {
								//console.log(value);
								return  ' $' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
							}
						}
					}]
				}
			}
		});
	}
	if (document.getElementById("investment-by-shark-bubble")) {
		var bubbleCTX = document.getElementById("investment-by-shark-bubble").getContext("2d");
		window.investmentPerSeasonBubble = new Chart(bubbleCTX, {
			type: 'bubble',
			data: seasonBySeasonBubbleData,
			options: {
				 title: {
					 display:true,
					 text:"Season by Season Deal Totals",
				 },
				 tooltips: {
					 custom: bubbleTooltips,
								/*
					 callbacks: {
						 label: function(tooltipItem, dataSet){
							 console.log(tooltipItem);
							 console.log(dataSet);
							 var data = dataSet.datasets[tooltipItem.datasetIndex];
							 var dataitem = data.data[tooltipItem.index];
							 var label = data.label;
							 var categories = data.categories;
													 
							 //console.log(dataitem);
							 var newLabel = label + ': $' + dataitem.amt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
							 //return  label + ': $' + dataitem.amt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
							 return newLabel;
						 }
					 }
								 */
													 
				 },
				 hover: {
					 mode: 'nearest',
					 intersect: true
				 },
				 scales: {
					 xAxes: [{
						 stacked: false,
							 scaleLabel: {
							 labelString: 'Seasons',
							 display: false
						 },
						 ticks: {
							 stepSize: 1,
							 callback: function(value, index, values) {
								 return "Season " + value;
							 }
						 }
					 }],
					 yAxes: [{
						 stacked: false,
						 scaleLabel: {
							 labelString: '# of Deals',
							 display: true
						 }
					 }]
				 }
			 },
		});
	}
	
	if (document.getElementById("season-deal-equity")) {
		var seasonEquityCtx = document.getElementById("season-deal-equity").getContext("2d");
		window.seasonDealEquity = new Chart(seasonEquityCtx, {
				type: 'bar',
				data: {
					labels: seasonBySeasonEquityLabels,
					datasets: [
						{
							label: "Proposed Equity",
							data: seasonBySeasonPropEquityData,
							backgroundColor: colorOne
						},
						{
							label: "Deal Equity",
							data: seasonBySeasonEquityData,
							backgroundColor: colorTwo
						}
					]
				},
			  options: {
					title:{
						display:true,
						text:"Shark Tank - Deal Equity Percentage"
					},
					tooltips: {
						mode: 'index',
						intersect: false,
						callbacks: {
							label: function(tooltipItem, data){
								//console.log(tooltipItem);
								//console.log(data);
								var dataset = data.datasets[tooltipItem.datasetIndex];
								var dataitem = dataset.data[tooltipItem.index];
								var label = dataset.label;
								//console.log(dataitem);
								return  'Avg ' + label +': ' + dataitem.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '%';
							}
						}
				  },
					responsive: true,
					scales: {
						xAxes: [{
							stacked: true,
						}],
						yAxes: [{
							stacked: false,
							scaleLabel: {
								labelString: "Equity %",
								display: true
							},
							ticks: {
								callback: function(value, index, values) {
									return value + "%";
								}
							}
						}]
					}
				}
	  });
	}

	
	if (window.investmentBySharkChart) window.investmentBySharkChart.resize();
	if (window.dealTypePieChart) window.dealTypePieChart.resize();
	if (window.investAmtPieChart) window.investAmtPieChart.resize();
	if (window.investmentPerSeasonChart) window.investmentPerSeasonChart.resize();
	if (window.seasonDealEquity) window.seasonDealEquity.resize();
	if (window.dealPitchCatPieChart) window.dealPitchCatPieChart.resize();
};
