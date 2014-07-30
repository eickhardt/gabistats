@extends('master')

@section('title', 'Statistics')

@section('content')
	
	<!-- JaveScript will use this canvas to draw the charts -->
	<canvas id="chart1"></canvas>
    <canvas id="chart2"></canvas>
    <canvas id="chart3"></canvas>
    <canvas id="chart4"></canvas>
	<canvas id="chart5"></canvas>

    <script type="text/javascript">
    	// Send some data along to JS so we can use it in our custom.js file

        // Chart 1
        var dataSet1NightCount = '<?php echo $dataSet1NightCount ?>';
        var dataSet1WeatherCount = '<?php echo $dataSet1WeatherCount ?>';
        var dataSet1FullCount = '<?php echo $dataSet1FullCount ?>';
        var dataSet1OnCount = '<?php echo $dataSet1OnCount ?>';

        var dataSet2NightCount = '<?php echo $dataSet2NightCount ?>';
        var dataSet2WeatherCount = '<?php echo $dataSet2WeatherCount ?>';
        var dataSet2FullCount = '<?php echo $dataSet2FullCount ?>';
        var dataSet2OnCount = '<?php echo $dataSet2OnCount ?>';

        // Chart 2
        var perfectSetLengthArrayPos = '<?php echo $perfectSetLengthArrayPos ?>';
        var perfectSetLabelsArrayPos = '<?php echo $perfectSetLabelsArrayPos ?>';

        // Chart 3
        var perfectSetLengthArrayNeg = '<?php echo $perfectSetLengthArrayNeg ?>';
        var perfectSetLabelsArrayNeg = '<?php echo $perfectSetLabelsArrayNeg ?>';

        // Chart 4
        var perfectSetPercentLengthArrayPos = '<?php echo $perfectSetPercentLengthArrayPos ?>';
        var perfectSetPercentLabelsArrayPos = '<?php echo $perfectSetPercentLabelsArrayPos ?>';
        
        // Chart 5
        var perfectSetPercentLengthArrayNeg = '<?php echo $perfectSetPercentLengthArrayNeg ?>';
        var perfectSetPercentLabelsArrayNeg = '<?php echo $perfectSetPercentLabelsArrayNeg ?>';
    </script>

    <!-- In this file all the JavaScript magic happens -->
    {{ HTML::script('/js/custom.js') }}

@stop