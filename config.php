<?php
/*
 * Config file for analytics API
 *
 * leebs 5-21-24
 */

$site      = "example.com";
$view      = "1111111";  // Site Property
$dateStart = "2018-01-01";
$dateEnd   = "2018-12-31";

$fields = array();
$dimensions = array();

// User
/*
$type="User";
$dimensions = array (
	'ga:userType'			=> 'User Type',
	'ga:sessionCount'		=> 'Count of Sessions',
//	'ga:daysSinceLastSession' => 'Days Since Last Session',
//	'ga:userBucket'			=> 'User Bucket',
);

$fields = array(
    'ga:users'               => 'Users',
    'ga:newUsers'            => 'New Users',
    'ga:percentNewSessions'  => 'Percent New Sessions',
//    'ga:1dayUsers'           => '1 Day Active Users',
//    'ga:7dayUsers'           => '7 Day Users',
    'ga:sessionsPerUser'     => 'Sessions per User',
);
*/
/*
// Sessions
$type="Sessions";
$fields = array(
    'ga:sessions'           => 'Sessions',
    'ga:bounces'            => 'Bounces',
    'ga:bounceRate'         => 'Bounce Rate',
    'ga:avgSessionDuration' => 'Average Session Duration',
    'ga:hits'               => 'Hits'
);
*/
// traffic sources
/*
$type = "sources";

$dimensions = array (
    'ga:referralPath'   => 'Referral Path',
    'ga:campaign'       => 'Campaign',
    'ga:source'         => 'Source',
    'ga:medium'         => 'Medium',
    'ga:sourceMedium'   => 'Source Medium',
    'ga:keyword'        => 'Keyword',
    'ga:adContent'      => 'Ad Content',
    'ga:socialNetwork'  => 'Social Network',
);

$fields = array(
    'ga:organicSearches'    => 'Organic Searches',
)
*/
// geo network
$type = "Geo";
$dimensions = array (
    'ga:continent'       => 'Contintent',
    'ga:subContinent'    => 'Sub Continent',
    'ga:country'         => 'Country',
    'ga:region'          => 'Region',
    //'ga:metro'           => 'Metro',
    'ga:city'            => 'City',
    'ga:latitude'        => 'Latitude',
    'ga:longitude'       => 'Longitude',
    'ga:networkDomain'   => 'Network Domain',
    'ga:networkLocation' => 'Network Location',
    //'ga:cityId'          => 'City Id',
    //'ga:continentId'     => 'Continent Id',
    //'ga:countryIsoCode'  => 'Country Iso',
    //'ga:metroId'         => 'Metro Id',
    //'ga:regionId'        => 'Region Id',
    //'ga:regionisoCode'   => 'Region Iso Code',
    //'ga:subContinentCode'=> 'Sub Continent Code',
);
// platform
/*
$type="Platform";
$dimensions = array(
    'ga:browser'                => 'Browser',
    'ga:browserVersion'         => 'Browser Version',
    'ga:operatingSystem'        => 'OS',
    'ga:mobileDeviceBranding'   => 'Mobile Device',
//    'ga:mobileDeviceModel'      => 'Mobile Device Model',
    'ga:dataSource'             => 'Data Source',
);
*/
/*
// Adwords
$type="Adwords";
$dimensions = array(
    'ga:adGroup'            => 'Ad Group',
    'ga:adSlot'             => 'Ad Slot',
    'ga:adDistributionNetwork' => 'Distribution Network',
    'ga:adMatchType'        => 'Match Type',
    'ga:adKeywordMatchType' => 'Keyword Match Type',
    'ga:adMatchedQuery'     => 'Search Query',
    'ga:adDisplayUrl'       => 'Display Url',
    'ga:adDestinationUrl'   => 'Destination Url',
    'ga:adQueryWordCount'   => 'Word Count',
);
*/

// Adwords
/*
$type="Adwords";
$fields = array(
    'ga:impressions'    => 'Impressions',
    'ga:adClicks'       => 'Ad Clicks',
    'ga:adCost'         => 'Ad Cost',
    'ga:CPM'            => 'CPM',
    'ga:CPC'            => 'CPC',
    'ga:CTR'            => 'CTR',
    'ga:costPerTransaction' => 'Cost Per Transaction',
//    'ga:costPerGoalConversion' => 'Cost Per Goal Transaction',
    'ga:costPerConversion'     => 'Cost Per Conversion',
    'ga:RPC'            => 'RPC',
    'ga:ROAS'           => 'ROAS',
);
*/ 

// Goal Conversions
/*
$type="goalConversions";
$fields = array(
    'ga:goalStartsAll'      => 'Goal Starts All',
    'ga:goalCompletionsAll' => 'Goal Completions All',
    'ga:goalValueAll'       => 'Goal Value All',
    'ga:goalValuePerSession'=> 'Goal Value Per Session',
    'ga:goalConversionRateAll' => 'Goal Conversion Rate All',
    'ga:goalAbandonsAll'    => 'Goal Abandons All',
    'ga:goalAbandonRateAll' => 'Goal Abandon Rate All',
);
*/

// Page Tracking
/*
$type="Tracking";
$dimensions = array(
    'ga:hostname'       => 'Hostname',
    'ga:pagePath'       => 'Page',
    'ga:pageTitle'      => 'Page Title',
    'ga:landingPagePath'=> 'Landing Page',
    'ga:secondPagePath' => 'Second Page',
    'ga:exitPagePath'   => 'Exit Page',
    'ga:previousPagePath'=> 'Previous Page Path',
    'ga:pageDepth'      => 'Page Depth',
);

$fields = array(
    'ga:pageValue'      => 'Page Value',
    'ga:entrances'      => 'Entrances',
    'ga:entranceRate'   => 'Entrances / Pageviews',
    'ga:pageviews'      => 'Pageviews',
    'ga:pageviewsPerSession' => 'Pages / Session',
    'ga:uniquePageviews'=> 'Unique Pageviews',
    'ga:timeOnPage'     => 'Time on Page',
    'ga:avgTimeOnPage'  => 'Avg. Time on Page',
    'ga:exits'          => 'Exits',
    'ga:exitRate'       => '% Exit',
);
*/

// Internal Search
/*
$type="InternalSearch";
$dimensions = array (
    'ga:searchUsed'     => 'Search Used',
    'ga:searchKeyword'  => 'Search Keyword',
    'ga:searchKeywordRefinement'=> 'Refined Keyword',
    'ga:searchCategory' => 'Site Search Category',
    'ga:searchStartPage'=> 'Start Page',
    'ga:searchDestinationPage' => 'Destination Page',
    'ga:searchAfterDestinationPage' => 'Search Destination Page',
);
$fields = array(
    'ga:searchResultViews'      => 'Results Pageviews',
    'ga:searchUniques'          => 'Total Unique Searches',
    'ga:avgSearchResultViews'   => 'Results Pageviews / Search',
    'ga:searchSessions'         => 'Sessions with Search',
    'ga:percentSessionsWithSearch' => '% Sessions with Search',
    'ga:searchDepth'            => 'Search Depth',
//    'ga:avgSearchDepth'         => 'Avg. Search Depth',
    'ga:searchRefinements'      => 'Search Refinements',
    'ga:searchDuration'         => 'Time after Search',
    'ga:searchExits'            => 'Search Exits',
    'ga:goalValueAllPerSearch'  => 'Per Search Goal Value'
);
*/

// Site Speed
/*
$type = "siteSpeed";
$dimensions = array();
$fields = array (
    'ga:pageLoadTime'       => 'Page Load Time',
//    'ga:pageLoadSample'     => 'Page Load Sample',
//    'ga:avgPageLoadTime'    => 'Avg. Page Load Time',
    'ga:domainLookupTime'   => 'Domain Lookup Time (ms)',
//    'ga:avgDomainLookupTime'=> 'Avg. Domain Lookup Time (sec)',
    'ga:pageDownloadTime'   => 'Page Download Time (ms)',
    'ga:redirectionTime'    => 'Redirection Time (ms)',
    'ga:serverConnectionTime'=> 'Server Connection Time (ms)',
    'ga:serverResponseTime' => 'Server Response Time (ms)',
    'ga:speedMetricsSample' => 'Speed Metrics Sample',
    'ga:domInteractiveTime' => 'Document Interactive Time (ms)',
    'ga:domContentLoadedTime'=> 'Document Content Load Time (ms)',
    'ga:domLatencyMetricsSample'=> 'DOM Latency Metrics Sample',
);
*/

// App Tracking
/*
$type="appTracking";
$dimensions = array(
    'ga:appInstallerId'     => 'App Installer Id',
    'ga:appVersion'         => 'App Version',
    'ga:appName'            => 'App Name',
    'ga:appId'              => 'App Id',
    'ga:screenName'         => 'Screen Name',
    'ga:screenDepth'        => 'Screen Depth',
    'ga:landingScreenName'  => 'Landing Screen',
    'ga:exitScreenName'     => 'Exit Screen',
);
$fields = array(
    'ga:screenviews'        => 'Screen Views',
    'ga:uniqueScreenviews'  => 'Unique Screen Views',
    'ga:screenviewsPerSession'=> 'Screens / Sessino',
    'ga:timeOnScreen'       => 'Time on Screen',
    'ga:avgScreenviewDuration'=> 'Avg. Time on Screen',
);
*/
// Event Tracking
/*
$type="eventTracking";
$dimensions = array();
$fields = array(
    'ga:totalEvents' => 'Total Events',
    'ga:uniqueEvents' => 'Unique Events',
    'ga:eventValue' => 'Event Value',
    'ga:avgEventValue' => 'Avg. Value',
    'ga:sessionsWithEvent' => 'Sessions with Event',
    'ga:eventsPerSessionWithEvent' => 'Events / Session with Event',
);
*/
// Ecommerce
/*
$type="ecommerce";
$dimensions = array (
    'ga:transactionId'      => 'Transaction ID',
    'ga:affiliation'        => 'Affiliation',
    'ga:sessionsToTransaction' => 'Sessions to Transaction',
    'ga:productSku'         => 'Product SKU',
    'ga:productName'        => 'Product',
    'ga:productCategory'    => 'Product Category',
    'ga:checkoutOptions'    => 'Checkout Options',
//    'ga:internalPromotionName' => 'Internal Promotion Name',
//    'ga:orderCouponCode'    => 'Order Coupon Code',
    'ga:shoppingStage'      => 'Shopping Stage',
);
$fields = array(
    'ga:itemQuantity'       => 'Quantity',
    'ga:uniquePurchases'    => 'Unique Purchases',
//    'ga:revenuePerItem'     => 'Avg. Price',
    'ga:itemRevenue'        => 'Product Revenue',
//    'ga:itemsPerPurchase'   => 'Avg. QTY',
//    'ga:internalPromotionCTR'=> 'Internal Promotion CTR',
//    'ga:productAddsToCart'  => 'Product Adds To Cart',
    'ga:productCheckouts'   => 'Product Checkouts',
    'ga:productRefundAmount'=> 'Product Refund Amount',
//    'ga:productRefunds'     => 'Product Refunds',
//    'ga:productRevenuePerPurchase' => 'Product Revenue Per Purchase',
    'ga:quantityCheckedOut' => 'Quantity Checked Out',
    'ga:quantityRefunded'   => 'Quantity Refunded',
//    'ga:quantityRemovedFromCart' => 'Quantity Removed From Cart',
);
*/

// Social Interactions
/*
$type="socialInteractions";
$dimensions = array (
    'ga:socialInteractionNetwork'   => 'Social Network',
    'ga:socialInteractionAction'    => 'Social Action',
    'ga:socialInteractionNetworkAction'=> 'Social Network and Action (Hit)',
    'ga:socialInteractionTarget'    => 'Social Entity',
    'ga:socialEngagementType'       => 'Social Type',
);
$fields = array (
    'ga:socialInteractions'         => 'Social Actions',
    'ga:uniqueSocialInteractions'   => 'Unique Social Actions',
    'ga:socialInteractionsPerSession'=> 'Actions Per Social Session'
);
*/

// Adsense
/*
$type="adsense";
// Only viewable in certain conditions ??
$dimensions = array();
$fields = array (
    'ga:adsenseRevenue'     => 'AdSense Revenue',
    'ga:adsenseAdUnitsViewed' => 'AdSense Ad Units Viewed',
    'ga:adsenseAdsViewed'   => 'AdSense Impressions',
    'ga:adsenseAdsClicks'   => 'AdSense Ads Clicked',
    'ga:adsensePageImpressions'=>'AdSense Page Impressions',
    'ga:adsenseCTR'         => 'AdSense CTR',
//    'ga:adsenseECPM'        => 'AdSense eCPM',
    'ga:adsenseExits'       => 'AdSense Exits',
    'ga:adsenseViewableImpressionPercent'=> 'AdSense Viewable Impression %',
//    'ga:adsenseCoverage'    => 'AdSense Coverage',
);
*/

// Publisher
/*
$type = "publisher";
$dimensions = array();
$fields = array (
    'ga:totalPublisherImpressions'      => 'Publisher Impressions',
    'ga:totalPublisherCoverage'         => 'Publisher Coverage',
    'ga:totalPublisherMonetizedPageviews'=> 'Publisher Monitized Pageviews',
    'ga:totalPublisherImpressionsPerSession'=> 'Publisher Impressions / Session',
    'ga:totalPublisherViewableImpressionsPercent'=> 'Publisher Viewable Impressions %',
    'ga:totalPublisherClicks'           => 'Publisher Clicks',
    'ga:totalPublisherCTR'              => 'Publisher CTR',
    'ga:totalPublisherRevenue'          => 'Publisher Revenue',
    'ga:totalPublisherRevenuePer1000Sessions' => 'Publisher Revenue / 1000 Session',
    'ga:totalPublisherECPM'             => 'Publisher eCPM',
);
*/
// Channel Grouping
/*
$type = "channelGrouping";
$dimensions = array();
$fields = array (
    'ga:channelGrouping' => 'Channel Grouping',
);
*/
