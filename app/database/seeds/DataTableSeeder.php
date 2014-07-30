<?php

class DataTableSeeder extends Seeder {

    public function run()
    {
        DB::table('data')->delete();

        $dataCsvFile = fopen(public_path().'/data/allPictureInfo.csv','r');

        // For each line in the file we want to add a row in the data table
        while(! feof($dataCsvFile))
        {
            $line = fgetcsv($dataCsvFile); // This is an array of the values on the line in the file

            Data::create([
                    'id' => $line[0],
                    'img_night' => $line[1] == 'false' ? 0 : 1,
                    'img_with_ship' => $line[2] == 'false' ? 0 : 1,
                    'img_matched_online' => $line[3] == 'false' ? 0 : 1,
                    'img_matched_previous' => $line[4] == 'false' ? 0 : 1,
                    'weather_bad' => $line[5] == 'false' ? 0 : 1,
                    'ship_percentage_on_img' => $line[6],
                    'ship_length' => $line[7],
                    'timestamp' => $line[8]
            ]);
        }
    }
}