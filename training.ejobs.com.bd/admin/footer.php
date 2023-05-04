    
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="assets/pages/widget/amchart/amcharts.min.js"></script>
<script src="assets/pages/widget/amchart/serial.min.js"></script>
<!-- Todo js -->
<script type="text/javascript " src="assets/pages/todo/todo.js "></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/pages/admin/custom-dashboard.js"></script>
<script>
'use strict';
var chart = AmCharts.makeChart( "statestics-chart", {
  "type": "serial",
  "addClassNames": true,
  "theme": "none",
  "autoMargins": false,
  "marginLeft": 30,
  "hideCredits": true,
  "marginRight": 8,
  "marginTop": 10,
  "marginBottom": 26,
  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 8,
    "color": "#0"
  },

  "dataProvider": [ 
  <?php
	        for($cday = 1; $cday <= 31; $cday++){
		if($day==31){$cmma = '';}else{$cmma = ',';}
				$liding_zero_day = sprintf('%02d', $cday); 
		
		 $paidstudent = 	collection_count_day('paidstudent',$liding_zero_day);
		 $paidstudent = ltrim($paidstudent,'0');
		if($paidstudent == ''){$paidstudent =0;}
		
		$totalform_student = 	collection_count_day('totalform',$liding_zero_day);	
		$totalform_student = ltrim($totalform_student,'0');
		if($totalform_student == ''){$totalform_student =0;}
		
		 $addmited_earning = 	collection_count_day('earning',$liding_zero_day);	
		$addmited_earning = ltrim($addmited_earning,'0');
		if($addmited_earning == ''){$addmited_earning =0;}
		//$ddf =  "{y: '".$cday."-".$addmited_earning.".TK', Students: ".$paidstudent.", Form: ".$totalform_student."}".$cmma."";
		if($cday==31){$sdf = '';}else{$sdf = ',';}
		echo '{"year": "'.$cday.'","addmission": '.$paidstudent.',"form": '.$totalform_student.'}'.$sdf.'';
		}
			?>
  
  ],
  "valueAxes": [ {
    "axisAlpha": 0,
    "position": "left"
  } ],
  "startDuration": 1,
  "graphs": [ {
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Addmission",
    "type": "column",
    "valueField": "addmission",
    "dashLengthField": "dashLengthColumn"
  }, {
    "id": "graph2",
    "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
    "bullet": "round",
    "lineThickness": 5,
    "bulletSize": 10,
    "bulletBorderAlpha": 10,
    "bulletColor": "#2b799c",
    "useLineColorForBulletBorder": true,
    "bulletBorderThickness": 3,
    "fillAlphas": 0,
    "lineAlpha": 1,
    "title": "Form",
    "valueField": "form",
    "dashLengthField": "dashLengthLine"
  } ],
  "categoryField": "year",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
    "tickLength": 0
  },
  "export": {
    "enabled": true
  }
} );
</script>
  
<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript " src="assets/js/SmoothScroll.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/demo-12.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

</body>

</html>