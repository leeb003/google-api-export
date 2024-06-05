<?php

// Load the Google API PHP Client Library.
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';  // Our config file

session_start();

$client = new Google_Client();
$client->setAuthConfig(__DIR__ . '/client_secrets.json');
$client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);


// If the user has already authorized this app then get an access token
// else redirect to ask the user to authorize access to Google Analytics.
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  // Set the access token on the client.
  $client->setAccessToken($_SESSION['access_token']);

  // Create an authorized analytics service object.
  $analytics = new Google_Service_AnalyticsReporting($client);

  $start = new DateTime($dateStart);
  $end = new DateTime($dateEnd);
  $newDay = $start;
  $i = 1;
  $year = $start->format('Y');
  $file = fopen($site . "-" . $year . "-" . $view . "-" . $type . ".csv", 'w');

  $headerFields = array('Date');

  while ($start <= $end) {
    $compDayF = $newDay->format('Y-m-d');
    echo "$i). " . $compDayF . "\n";
    $newDay   = $start->add(new DateInterval('P1D'));
    $newDayF  = $newDay->format('Y-m-d');
    $response = getReport($analytics, $compDayF, $newDayF, $view, $file, $fields, $dimensions);

    if ($i == 1) { // build header row
        $headerNames = $response['reports'][0]['columnHeader']['metricHeader']['metricHeaderEntries'];
        foreach ($headerNames as $k => $v) {
            array_push($headerFields, $v['name']);
        }
        $dimensionNames = $response['reports'][0]['columnHeader']['dimensions'];
        foreach ($dimensionNames as $k => $v) {
            array_push($headerFields, $v);
        }
        fputcsv($file, $headerFields);
    }

    // Print the response.
    //printResults($response);
    //print_r($response);
    //$values = $response['reports'][0]['data']['totals'][0]['values'];
    $dataValues = $response['reports'][0]['data']['rows'];

    foreach ($dataValues as $k => $v) {
        //print_r($v);
        $values = array();
        $metricValue = $v['metrics'][0]->values;
        foreach ($metricValue as $k2 => $v2) {
            array_push($values, $v2);
        }
        $dataRows = $v['dimensions'];
        foreach ($dataRows as $k2 => $v2) {
            array_push($values, $v2);
        }
        $values = [$compDayF, ...$values];
        fputcsv($file, $values);
    }
    $dataRows = $response['reports'][0]['data']['rows'][0]->dimensions;
    foreach ($dataRows as $k => $v) {
        array_push($values, $v);
    }
    //$values = [$compDayF, ...$values];    
    //print_r($values);
    //fputcsv($file, $values);
    echo "<p>processing...$newDayF</p>";

    $i++;
  }
  fclose($file);

} else {
  $redirect_uri = 'https://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}


/**
 * Queries the Analytics Reporting API V4.
 *
 * @param service An authorized Analytics Reporting API V4 service object.
 * @return The Analytics Reporting API V4 response.
 */
function getReport($analytics, $compDayF, $newDayF, $view, $file, $fields, $dimensions) {

  // Replace with your view ID, for example XXXX.
  $VIEW_ID = $view;

  // Create the DateRange object.
  $dateRange = new Google_Service_AnalyticsReporting_DateRange();
  //$dateRange->setStartDate("7daysAgo");
  $dateRange->setStartDate($compDayF);
  //$dateRange->setEndDate("today");
  $dateRange->setEndDate($newDayF);

  // Metrics
  $metrics = array();
  foreach ($fields as $k => $v) {
    $metric = new Google_Service_AnalyticsReporting_Metric();
    $metric->setExpression($k);
    $metric->setAlias($v);
    $metrics[] = $metric;
  }
  // Dimensions
  $dimensionA = array();
  foreach ($dimensions as $k => $v) {
    $dimension = new Google_Service_AnalyticsReporting_Dimension();
    $dimension->setName($k);
    $dimensionA[] = $dimension;
  }

  // Create the ReportRequest object.
  $request = new Google_Service_AnalyticsReporting_ReportRequest();
  $request->setViewId($VIEW_ID);
  $request->setDateRanges($dateRange);
  $request->setMetrics(array($metrics));
  $request->setDimensions(array($dimensionA));

  $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
  $body->setReportRequests( array( $request) );
  return $analytics->reports->batchGet( $body );
}


/**
 * Parses and prints the Analytics Reporting API V4 response.
 *
 * @param An Analytics Reporting API V4 response.
 */
function printResults($reports) {
  for ( $reportIndex = 0; $reportIndex < count( $reports ); $reportIndex++ ) {
    $report = $reports[ $reportIndex ];
    $header = $report->getColumnHeader();
    $dimensionHeaders = $header->getDimensions();
    $metricHeaders = $header->getMetricHeader()->getMetricHeaderEntries();
    $rows = $report->getData()->getRows();

    for ( $rowIndex = 0; $rowIndex < count($rows); $rowIndex++) {
      $row = $rows[ $rowIndex ];
      $dimensions = $row->getDimensions();
      $metrics = $row->getMetrics();
      if (isset($dimensionHeaders)) {
        for ($i = 0; $i < count($dimensionHeaders) && $i < count($dimensions); $i++) {
          print($dimensionHeaders[$i] . ": " . $dimensions[$i] . "\n");
        }
      }

      for ($j = 0; $j < count($metrics); $j++) {
        $values = $metrics[$j]->getValues();
        for ($k = 0; $k < count($values); $k++) {
          $entry = $metricHeaders[$k];
          print($entry->getName() . ": " . $values[$k] . "\n");
        }
      }
    }
  }
}
