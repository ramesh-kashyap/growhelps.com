jQuery(function($){  
   // for tooltip
   $('[data-toggle="tooltip"]').tooltip(); 
   $('.tabs .tab-links a').on('click', function(e)  {
          var currentAttrValue = $(this).attr('href');
   
          // Show/Hide Tabs
          $('.tabs '+ currentAttrValue).slideDown(400).siblings().slideUp(400);
   
          // Change/remove current tab to active
          $(this).parent('li').addClass('active').siblings().removeClass('active');
          e.preventDefault();
    }); 
    //Setting calculator
	var percent 	= [0.42,0.49,0.54];
	var minMoney 	= [0.002,0.51,1.001];
	var maxMoney	= [0.5,1,999999999];
	$("#btc_amt").val(minMoney[0]);
	/*calculator*/
	function calc(){	
		money = parseFloat($("#btc_amt").val());
		id = -1;
		var length = percent.length;
		var i = 0;
		do {
			if(minMoney[i] <= money && money <= maxMoney[i]){
				id = i;
				i = i + length;
			}
			i++
		}
		while(i < length)	
		if(id != -1){
			profitHourly = money / 100 * percent[id];
			profitHourly = profitHourly.toFixed(8);
			profitDaily = profitHourly * 24;
			profitDaily = profitDaily.toFixed(8);
			profitWeekly = profitDaily * 7;
			profitWeekly = profitWeekly.toFixed(8);
			profitMonthly = profitDaily * 30;
			profitMonthly = profitMonthly.toFixed(8);

			if(money < minMoney[id] || isNaN(money) == true){
				$("#profitHourly").text("Error!");
				$("#profitDaily").text("Error!");
				$("#profitWeekly").text("Error!");
				$("#profitMonthly").text("Error!");
			} else {
				$("#profitHourly").text(profitHourly);
				$("#profitDaily").text(profitDaily);
				$("#profitWeekly").text(profitWeekly);
				$("#profitMonthly").text(profitMonthly);
			}
		} else {
			$("#profitHourly").text("Error!");
			$("#profitDaily").text("Error!");
			$("#profitWeekly").text("Error!");
			$("#profitMonthly").text("Error!");
		}		
	}
	calc();
    if($("#btc_amt").length){
		calc();
	}
	$("#btc_amt").keyup(function(){
		calc();
	});	
});	