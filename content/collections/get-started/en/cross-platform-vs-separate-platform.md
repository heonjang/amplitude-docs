---
id: 95a8c851-e03e-4b3d-907b-d3381dd46957
blueprint: get-started
title: 'Cross-platform instrumentation vs. separate platform instrumentation'
source: 'https://help.amplitude.com/hc/en-us/articles/207108557-Cross-platform-instrumentation-vs-separate-platform-instrumentation'
author: 0c3a318b-936a-4cbd-8fdf-771a90c297f0
updated_by: 5817a4fa-a771-417a-aa94-a0b1e7f55eae
updated_at: 1716571291
this_article_will_help_you:
  - "Understand the differences between cross-platform instrumentation and separate platform instrumentation, and when it's best to implement one over the other"
landing: false
exclude_from_sitemap: false
---
Amplitude customers often ask if the same API Key should be used for the iOS and Android versions of the same app, or if web and mobile data should be tied together. The answer depends on the kind of apps you have and the kind of analyses you want to do.

In some cases, the app will behave differently on each individual platform—Android, iOS, and web—so your top priority should be to analyze how each one performs on its own. In others, understanding a user's behavior irrespective of the platform is the top priority: you know your users can come from any platform, and you're more interested in a user's actions than the platform they were on when they took those actions.

To help you decide whether you should combine data from various platforms into a single Amplitude project or separate them, let's explore the pros and cons of each option.

## When should you do a cross-platform instrumentation?

Here are some situations when it makes sense to do a cross-platform instrumentation:

* You expect frequent user crossover between platforms.
* You want to analyze user behavior across platforms as a key focus for your company. (You'll need to collect user IDs for this.)
* You have experience using the same API key in another analytics product.
* You've read and understood the advantages of using the same API keys (found below).

There are two primary advantages to this approach: You can see totals across all platforms in a single unified view; and you can create funnels or retention charts that analyze user behavior across platforms.

## When should you do a separate platform instrumentation?

Sometimes it makes more sense to do a separate platform instrumentation. Here are a couple examples:

* Your app acts as a standalone on each platform, and user crossover analysis is not important.
* Your goal is to understand how users are engaging within each platform.

Additionally, there are several advantages to consider:

* **Platform differences:** Even if your app has the same primary functions on iOS and Android, there are slight differences when it comes to how certain actions are tracked (e.g. asking for permissions) that you may want to separate. Any slight differences in the apps themselves (e.g. showing different landing/tutorial screens) will be best managed if separated as well.
* **Different update cycles:** Instrumentation changes happen all the time, and it's rare for app updates to be released on the same day. This means data and possibly new events from a **new** version on a certain platform could get mixed in with data and old events on the **old** version, which would pollute the dashboard and take focus away from the important metrics.
* **Difficulty finding errors:** Having events from multiple platforms on the same dashboard makes it more difficult to spot errors and bugs in instrumentation and make the necessary fixes.
* **Web and mobile are VERY different:** The experiences on web and mobile differ, and the kinds of events you will probably want to track will be very different as well.