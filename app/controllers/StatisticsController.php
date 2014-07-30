<?php

class StatisticsController extends BaseController {

	public function showIndex()
	{
		// This is where we pull out the different data sets for each chart

		// Chart1 shows blabla
		$dataSet1 = Data::where('img_matched_online', 1)->get();
		$dataSet1Count = $dataSet1->count();
		$dataSet1NightCount = round(Data::where('img_matched_online', 1)->where('img_night', 1)->count() / $dataSet1Count * 100, 2);
		$dataSet1WeatherCount = round(Data::where('img_matched_online', 1)->where('weather_bad', 1)->count() / $dataSet1Count * 100, 2);
		$dataSet1FullCount = round(Data::where('img_matched_online', 1)->where('ship_percentage_on_img', '<', 0)->count() / $dataSet1Count * 100, 2);
		$dataSet1OnCount = round(Data::where('img_matched_online', 1)->where('img_with_ship', 1)->count() / $dataSet1Count * 100, 2);

		$dataSet2 = Data::where('img_matched_online', 0)->get();
		$dataSet2Count = $dataSet2->count();
		$dataSet2NightCount = round(Data::where('img_matched_online', 0)->where('img_night', 1)->count() / $dataSet2Count * 100, 2);
		$dataSet2WeatherCount = round(Data::where('img_matched_online', 0)->where('weather_bad', 1)->count() / $dataSet2Count * 100, 2);
		$dataSet2FullCount = round(Data::where('img_matched_online', 0)->where('ship_percentage_on_img', '<', 0)->count() / $dataSet2Count * 100, 2);
		$dataSet2OnCount = round(Data::where('img_matched_online', 0)->where('img_with_ship', 1)->count() / $dataSet2Count * 100, 2);

		// Chart2 shows distrubution of ship lengths on perfect images
		$meters = 0;
		$perfectSetLabelsArray = [];
		$perfectSetLengthArray = [];
		for ($i=0; $i < 30; $i++) {
			$newMeters = $meters + 10;
			$oldMeters = $meters + 1;
			$totalNumberOfShipsThisLength = Data::where('ship_length', '>', $meters)->where('ship_length', '<=', $newMeters)->get()->count();
			$perfectSetLabelsArray[] = "{$oldMeters}m - {$newMeters}m";

			$shipCount = Data::where('img_night', 0)->where('weather_bad', 0)->where('img_with_ship', 1)->where('ship_percentage_on_img', '>', 0)->where('img_matched_online', 1)->where('ship_length', '>', $meters)->where('ship_length', '<=', $newMeters)->get()->count();
			if ($shipCount)
				$shipCount = round($shipCount / $totalNumberOfShipsThisLength * 100, 2);
			$perfectSetLengthArray[] = $shipCount;
			$meters = $newMeters;
		}

		$perfectSetLengthArrayPos = json_encode($perfectSetLengthArray);
		$perfectSetLabelsArrayPos = json_encode($perfectSetLabelsArray);

		// Chart3 shows distrubution of ship lengths on perfect images
		$meters = 0;
		$perfectSetLabelsArray = [];
		$perfectSetLengthArray = [];
		for ($i=0; $i < 30; $i++) {
			$newMeters = $meters + 10;
			$oldMeters = $meters + 1;
			$totalNumberOfShipsThisLength = Data::where('ship_length', '>', $meters)->where('ship_length', '<=', $newMeters)->get()->count();
			$perfectSetLabelsArray[] = "{$oldMeters}m - {$newMeters}m";

			$shipCount = Data::where('img_night', 0)->where('weather_bad', 0)->where('img_with_ship', 1)->where('ship_percentage_on_img', '>', 0)->where('img_matched_online', 0)->where('ship_length', '>', $meters)->where('ship_length', '<=', $newMeters)->get()->count();
			if ($shipCount)
				$shipCount = round($shipCount / $totalNumberOfShipsThisLength * 100, 2);
			$perfectSetLengthArray[] = $shipCount;
			$meters = $newMeters;
		}

		$perfectSetLengthArrayNeg = json_encode($perfectSetLengthArray);
		$perfectSetLabelsArrayNeg = json_encode($perfectSetLabelsArray);

		// Chart4 shows distrubution of ship percentage on image on perfect images
		$percent = -100;
		$perfectSetLabelsArray = [];
		$perfectSetLengthArray = [];
		for ($i=0; $i < 20; $i++) {
			$newPercent = $percent + 10;
			$oldPercent = $percent + 1;
			$totalNumberOfShipsThisLength = Data::where('ship_percentage_on_img', '>', $percent)->where('ship_percentage_on_img', '<=', $newPercent)->get()->count();
			$perfectSetLabelsArray[] = "{$oldPercent}% - {$newPercent}%";

			$shipCount = Data::where('img_night', 0)->where('weather_bad', 0)->where('img_with_ship', 1)->where('img_matched_online', 1)->where('ship_percentage_on_img', '>', $percent)->where('ship_percentage_on_img', '<=', $newPercent)->get()->count();
			if ($shipCount)
				$shipCount = round($shipCount / $totalNumberOfShipsThisLength * 100, 2);
			$perfectSetLengthArray[] = $shipCount;
			$percent = $newPercent;
		}

		$perfectSetPercentLengthArrayPos = json_encode($perfectSetLengthArray);
		$perfectSetPercentLabelsArrayPos = json_encode($perfectSetLabelsArray);

		// Chart5 shows distrubution of ship percentage on image on perfect images
		$percent = -100;
		$perfectSetLabelsArray = [];
		$perfectSetLengthArray = [];
		for ($i=0; $i < 20; $i++) {
			$newPercent = $percent + 10;
			$oldPercent = $percent + 1;
			$totalNumberOfShipsThisLength = Data::where('ship_percentage_on_img', '>', $percent)->where('ship_percentage_on_img', '<=', $newPercent)->get()->count();
			$perfectSetLabelsArray[] = "{$oldPercent}% - {$newPercent}%";

			$shipCount = Data::where('img_night', 0)->where('weather_bad', 0)->where('img_with_ship', 1)->where('img_matched_online', 0)->where('ship_percentage_on_img', '>', $percent)->where('ship_percentage_on_img', '<=', $newPercent)->get()->count();
			if ($shipCount)
				$shipCount = round($shipCount / $totalNumberOfShipsThisLength * 100, 2);
			$perfectSetLengthArray[] = $shipCount;
			$percent = $newPercent;
		}

		$perfectSetPercentLengthArrayNeg = json_encode($perfectSetLengthArray);
		$perfectSetPercentLabelsArrayNeg = json_encode($perfectSetLabelsArray);

		// Create the view, and pass along the dataz
		return View::make('statistics.index', compact(
			'dataSet1NightCount', // 1
			'dataSet1WeatherCount', // 1
			'dataSet1FullCount', // 1
			'dataSet1OnCount', // 1
			'dataSet2NightCount', // 1
			'dataSet2WeatherCount', // 1
			'dataSet2FullCount', // 1
			'dataSet2OnCount', // 1

			'perfectSetLengthArrayPos', // 2
			'perfectSetLabelsArrayPos', // 2

			'perfectSetLengthArrayNeg', // 3
			'perfectSetLabelsArrayNeg', // 3

			'perfectSetPercentLengthArrayPos', // 4
			'perfectSetPercentLabelsArrayPos', // 4

			'perfectSetPercentLengthArrayNeg', // 5
			'perfectSetPercentLabelsArrayNeg' // 5
		));
	}
}