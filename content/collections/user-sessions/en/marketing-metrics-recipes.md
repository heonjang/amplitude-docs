---
id: e34199cd-89b9-4b99-9b66-f0389adca042
blueprint: user-session
title: 'Marketing metrics recipes'
this_article_will_help_you:
  - 'Use Amplitude charts to analyze common marketing metrics'
landing: false
source: /hc/en-us/articles/23990255180443-Marketing-metrics-recipes
updated_by: 0c3a318b-936a-4cbd-8fdf-771a90c297f0
updated_at: 1718945038
---
Amplitude Analytics provides a multitude of insights into the success of your product's marketing efforts. This article highlights the ingredients needed to recreate common marketing metrics using [Event Segmentation](/analytics/charts/event-segmentation/event-segmentation-build) or [User Sessions](/analytics/charts/user-sessions/user-sessions-track-engagement-frequency) charts.

## Before you begin

If you haven’t already read up on the basics of [building charts in Amplitude](/analytics/charts/build-charts-add-events), you should do so before proceeding.

Some of the setup instructions in this article require the use of custom formulas. See this article to read more about [custom formula metrics, syntax, and definitions](/analytics/charts/event-segmentation/event-segmentation-custom-formulas).

## Metric recipes

The examples in this section provide a starting point for setting up each metric. As with other analyses, use filters, group-bys, or segmentation to refine results. 

|                                                       |                           |                                                   |
| ----------------------------------------------------- | ------------------------- | ------------------------------------------------- |
| [Session totals](#session-totals)                     | [Visitors](#visitors)     | [Sessions per user](#sessions-per-user)           |
| [Average session duration](#average-session-duration) | [Page views](#page-views) | [Page views per session](#page-views-per-session) |
| [Bounce rate](#bounce-rate)                           | [Entry rate](#entry-rate) | [Exit rate](#exit-rate)                           |

{{partial:admonition type='note'}}
The setup instructions for session totals, visitors, page views, bounce rate, entry rate, and exit rate can also be applied to [Data Tables](/docs/analytics/charts/data-tables/data-tables-multi-dimensional-analysis) analyses.
{{/partial:admonition}}

### Session totals

The session totals metric provides a sum of sessions.

Use the following setup for each module in your User Sessions chart to create the session totals metric:

* **Sessions**: `Count` sessions for all sessions

  If desired, filter results by a specific domain or URL: 

  * Click *Filter by* and choose `Contains Event`. Search for the `Page Viewed` event. Set the count to greater than or equal to one.
  * Click the Filter to add a where clause for your desired `Page URL`.

* **Measured as**: `Total Sessions`
* **Segmented by**: All users

### Visitors

The visitors metric gives a count of unique users who trigger a specific event.

Use the following setup for each module in your Event Segmentation chart to create the visitors metric:

* **Events**: `Page View`

  If desired, filter results by a specific domain or URL: 

  * Click *Filter by* and choose `Page URL`. Select the checkbox next to your desired domain and click *Apply*.

* **Measured as**: `Uniques`
* **Segmented by**: All users

### Sessions per user

The sessions per user metric gives an average count of sessions by unique user.

Use the following setup for each module in your User Session chart to create the sessions per user metric:

* **Sessions**: `Count` sessions for all sessions

If desired, filter results by a specific domain or URL: 

  * Click *Filter by* and choose `Contains Event`. Search for the `Page Viewed` event. Set the count to greater than or equal to one.
	* Click Filter to add a where clause for your desired `Page URL`.

* **Measured as**: `Avg Per User`
* **Segmented by**: All users

### Average session duration

The average session duration metric gives an average length of sessions.

Use the following setup for each module in your User Sessions chart to create the average session duration metric:

* **Sessions**: `Count` sessions for all sessions

If desired, filter results by a specific domain or URL: 

  * Click *Filter by* and choose `Contains Event`. Search for your desired `Page View` event. Set the count to greater than or equal to one.
	* Click Filter to add a where clause for your desired `Page URL`.

* **Measured as**: `Avg length` (counting in days, hours, minutes)
* **Segmented by**: All users

### Page views

The page views metric gives a sum of page views events.

Use the following setup for each module in your Event Segmentation chart to create the page views metric:

* **Events**: `Page View`

If desired, filter results by a specific domain or URL: 

  * Click *Filter by* and choose `Page URL`. Select the checkbox next to your desired domain and click *Apply*.

* **Measured as**: `Event Totals`
* **Segmented by**: All users

### Page views per session

The page views per session gives an average count of `Page View` events per session.

Use the following setup for each module in your User Session chart to create the page views per session metric:

* **Sessions**: `Count` events performed within sessions for all sessions
	* `By Event Count` of the `Page View` event

If desired, filter results by a specific domain or URL: 

  * Click *Filter by* and choose `Contains Event`. Search for the `Page Viewed` event. Set the count to greater than or equal to one.
	* Click Filter to add a where clause for your desired `Page URL`.

* **Measured as**: `Avg events per session`
* **Segmented by**: All users

### Bounce rate

The bounce rate metric compares the count of sessions with a single `Page View` event to the total number of sessions as a percentage. 

Use the following setup for each module in your User Sessions chart to create the bounce rate metric:

* **Sessions**: `Count` sessions  

	* A: All sessions
		* where `Contains Event` = `Page Viewed` with a count of one
	* B: All sessions

If desired, filter results by a specific domain or URL of each session: 

  * Click *Filter by* and choose `Contains Event` for session B. Search for the `Page Viewed` event. Set the count to greater than or equal to one for session B.
	* Click Filter to add a where clause for your desired `Page URL` for sessions A and B.

* **Measured as**: Formula `%:SESSIONTOTALS(A)/SESSIONTOTALS(B)`
* **Segmented by**: All users

This User Sessions chart is set up to calculate the 30-day bounce rate for the `Page URL` ampli.com/home. The bounce rate for March 4th was 97.3 percent.

![bounceRate_wDomain.png](/docs/output/img/user-sessions/bouncerate-wdomain-png.png)

### Entry rate

The entry rate metric gives the comparison of sessions with a `Page View` event grouped by the **first property value** of the specified event property to the total number of sessions as a percentage. 

Use the following setup for each module in your User Sessions chart to create the entry rate metric:

* **Sessions**: `Count` sessions  

	* A: All sessions
		* Grouped by the `First Property Value` of the `Page View` event property `Page Title`
	* B: All sessions

If desired, filter results by a specific domain or URL of sessions A and B: 

  * Click *Filter by* and choose `Contains Event`. Search for the `Page Viewed` event. Set the count to greater than or equal to one.
	* Click Filter to add a where clause for your desired `Page URL`.

* **Measured as**: Formula `%:SESSIONTOTALS(A)/SESSIONTOTALS(B)`
* **Segmented by**: All users

This User Sessions chart is set up to calculate the 30-day entry rate for the `Page URL` ampli.com/home. The chart’s group-by property value `Page Title` is seen as different colored lines in the chart. The entry rate for March 3rd was 35.5 percent for the `Home` property value.

![entryRate_wDomain.png](/docs/output/img/user-sessions/entryrate-wdomain-png.png)

### Exit rate

The exit rate metric gives the comparison of sessions with a `Page View` event grouped by the **last property value** of the specified event property to the total number of sessions as a percentage. 

Use the following setup for each module in your User Sessions chart to create the exit rate metric:

* **Sessions**: `Count` sessions  

	* A: All sessions
		* Grouped by the `Last Property Value` of the `Page View` event property `Page Title`
	* B: All sessions

If desired, filter results by a specific domain or URL of sessions A and B: 

  * Click *Filter by* and choose `Contains Event`. Search for the `Page Viewed` event. Set the count to greater than or equal to one.
	* Click Filter to add a where clause for your desired `Page URL`.

* **Measured as**: Formula `%:SESSIONTOTALS(A)/SESSIONTOTALS(B)`
* **Segmented by**: All users

This User Sessions chart is set up to calculate the 30-day exit rate for the `Page URL` ampli.com/home. The chart’s group-by property value `Page Title` is seen as different colored lines in the chart. The exit rate for March 4th was 16.1 percent for the `Log In` property value.

![exitRate_wDomain.png](/docs/output/img/user-sessions/exitrate-wdomain-png.png)