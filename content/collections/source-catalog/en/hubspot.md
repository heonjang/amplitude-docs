---
id: 10e1c166-7b35-4f0a-8ef1-455b21106cb7
blueprint: source-catalog
use_cases:
  - 'Target key cohorts with messaging informed by customer insights'
  - 'Analyze and improve the performance of marketing campaigns'
  - 'HubSpot streaming integration enables you to forward your Amplitude events and event properties'
short_description: 'HubSpot is an all-in-one marketing tool that helps attract new leads and convert them into paying customers.'
integration_category:
  - marketing-automation
integration_type:
  - event-streaming
  - raw-events
  - cohorts
partner_doc_link: 'https://ecosystem.hubspot.com/marketplace/apps/marketing/analytics-data/amplitude-engage'
title: HubSpot
source: 'https://www.docs.developers.amplitude.com/data/sources/hubspot'
category: 'Marketing Automation'
author: 0c3a318b-936a-4cbd-8fdf-771a90c297f0
connection: source
partner_maintained: false
integration_icon: partner-icons/hubspot.svg
exclude_from_sitemap: false
updated_by: 0c3a318b-936a-4cbd-8fdf-771a90c297f0
updated_at: 1713825381
---
[HubSpot](http://www.hubspot.com/) is an all-in-one marketing tool that helps attract new leads and convert them into paying customers, with features like landing page creation and email automation.

HubSpot's integration sends events generated by email campaigns from HubSpot to Amplitude.

## Considerations

- You need a HubSpot account and an Amplitude plan.
- This integration doesn't support sending event data into Amplitude's EU data center.
- This integration supports these identifiers:
    - User ID: Email address
    - Connection type: Server
- You can connect the same Amplitude project to multiple HubSpot accounts. You can confirm this by referring to the HubSpot Portal ID on the "Get Started Page" after you've connected via OAuth.
- The 10 events Amplitude fetches from HubSpot are those generated by HubSpot's Email API. You can't create and send  custom events with this integration.

## Setup

1. In Amplitude Data, click **Catalog** and select the **Sources** tab.
2. In the Other Sources section, click **HubSpot**.
3. Click **Connect to HubSpot** to authenticate via HubSpot.
4. Select all the relevant event types that you want to pull from HubSpot into Amplitude and click **Next**.
5. Click **Finish**.

## Sent events

This table shows you the events sent per channel.

| HubSpot Event | Amplitude Event               | Description                                                                                                                                    |
| ------------- | ----------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------- |
| SENT          | [HubSpot] EMAIL_SENT          | The message was sent to and received by the delivery provider, which has queued it for further handling.                                       |
| DROPPED       | [HubSpot] EMAIL_DROPPED       | Either HubSpot or by the delivery provider rejected the message, they won't attempt to deliver the message again.                              |
| PROCESSED     | [HubSpot] EMAIL_PROCESSED     | The message was received by the delivery provider, which has indicated it will attempt to deliver the message to the recipient's email server. |
| DELIVERED     | [HubSpot] EMAIL_DELIVERED     | The recipient's email server has accepted the message and the message has been successfully delivered to the recipient.                        |
| DEFERRED      | [HubSpot] EMAIL_DEFERRED      | The recipient's email server has temporarily rejected the message, and subsequent attempts will be made to deliver the message.                |
| BOUNCE        | [HubSpot] EMAIL_BOUNCE        | The recipient's email server couldn't or wouldn't accept the message, and no further attempts will be made to deliver the message.             |
| OPEN          | [HubSpot] EMAIL_OPEN          | The recipient opened the message.                                                                                                              |
| CLICK         | [HubSpot] EMAIL_CLICK         | The recipient clicked on a link within the message.                                                                                            |
| STATUSCHANGE  | [HubSpot] EMAIL_STATUS_CHANGE | The recipients changed their email subscriptions in some way.                                                                                  |
| SPAMREPORT    | [HubSpot] EMAIL_SPAM_REPORT   | The recipient flagged the message as spam.                                                                                                     |

See the [Email Events API Overview](https://legacydocs.hubspot.com/docs/methods/email/email_events_overview) from HubSpot for more details on the type of properties associated with each particular event.

List of user properties that Amplitude tracks:

- city
- region
- country
- `os_name`
- `os_version`

## Rename events

Using `data.amplitude.com`, you can change the display name and description for events, event properties, and user properties after the emails have been ingested into Amplitude.

## Unsubscribe from specific events

1. In Amplitude, navigate to the Sources page and click **HubSpot**.
2. Navigate to the **Edit Import Config tab**.
3. Select events that you wish to subscribe or unsubscribe to from HubSpot by checking the boxes.
4. Click **Update Import Configuration** to save changes.

## Confirm that Amplitude receives events

Amplitude makes requests to the HubSpot API on your behalf at a 1-hour interval to pull the latest HubSpot data in batches. You can verify this by going through the following steps:

1. In Amplitude, navigate to the Sources page and click **HubSpot**.
2. Navigate to the Ingestion Jobs tab to see the data history being imported from HubSpot.

## Example use case

Example Use Case: A marketing manager wants to analyze the performance of a sent email campaign.

Here are the following steps that you can take to analyze your email campaign:

1. Copy the Internal HubSpot ID from HubSpot. Each Internal HubSpot ID is unique and is associated with a particular email.
2. Next, go into Amplitude to create a funnel chart and filter by specific events to analyze the conversion rates. For example: `Email_Delivered` → `Email_Open`.
3. Based on the funnel, you can create a specific cohort for re-targeting purposes. For example,  users who opened the email.

Users can create a Funnel chart to see the conversion rate/email open rate or create a cohort to see how many people performed an "action" for a given email.