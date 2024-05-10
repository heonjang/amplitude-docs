---
id: 4be26940-0200-46a2-a614-a2c8df0808b1
blueprint: flutter_sdk
title: 'Flutter SDK 4.0 Migration Guide'
sdk_status: Beta
article_type: migration
supported_languages:
  - dart
exclude_from_sitemap: false
updated_by: 0c3a318b-936a-4cbd-8fdf-771a90c297f0
updated_at: 1715204523
---
Amplitude Flutter SDK 4.0 features default event tracking, simplified interfaces, and wraps the latest [Amplitude iOS](/data/sdks/ios-swift/) and [Android Kotlin](/data/sdks/android-kotlin/) SDKs. 


## Terminology

* `amplitude_flutter:v3`: Flutter SDK 3.0
* `amplitude_flutter:v4`: Flutter SDK 4.0

## Dependencies

Open `pubspec.yaml` and update the dependency:

```diff
dependencies:
-  amplitude_flutter: ^3
+  amplitude_flutter: ^4.0.0-beta.1
```

## Instrumentation

Flutter SDK 4.0 offers an API to instrument events. To migrate to Flutter SDK 4.0, you need to update a few calls. The following sections detail which calls have changed.

## Initialization

Like all other calls, `instance()` is removed. Flutter SDK 4.0 uses the Configuration object to set the configuration. See [Configuration](#configuration) for more information.

```dart
import 'package:amplitude_flutter/amplitude.dart'; //[tl! --:1]
import 'package:amplitude_flutter/identify.dart';
import 'package:amplitude_flutter/amplitude.dart'; //[tl! ++:1]
import 'package:amplitude_flutter/configuration.dart';

// Create the instance and initialize SDK
final Amplitude amplitude = Amplitude.getInstance(instanceName: "project"); //[tl! --:4]
amplitude.setServerUrl("https://your.endpoint.com")
amplitude.setServerZone("US")
amplitude.trackingSessionEvents(true)
amplitude.init(widget.apiKey);
final Amplitude amplitude = Amplitude(Configuration( //[tl! ++:8]
    apiKey: "YOUR-API-KEY",
    serverUrl: "https://your.endpoint.com",
    serverZone: ServerZone.eu,
    defaultTracking: DefaultTrackingOptions(
       sessions: true
    )
  ));
await amplitude.isBuilt;
```

## Configuration

Flutter SDK 4.0 includes the following configuration changes:

* It's more consistent across runtimes.
* It no longer supports certain configurations.
* It uses an instance variable for configuration, versus setters in SDK version 3.0.
* Configuration is immutable after you pass it to Amplitude.

|Flutter SDK 3.0                      |Flutter SDK 4.0                     |
|-------------------------------------|------------------------------------|
| `enableCoppaControl()` or `disableCoppaControl()` | `config.enableCoppaControl`         |
| `setMinTimeBetweenSessionsMillis()` | `config.minTimeBetweenSessionsMillis` |
| `setEventUploadThreshol(d)`         | `config.flushQueueSize`            |
| `setEventUploadPeriodMillis()`      | `config.flushIntervalMillis`       |
| `setServerZone()`                   | `config.serverZone`                |
| `setServerUrl()`                    | `config.serverUrl`                 |
| `setUseDynamicConfig()`             | NOT SUPPORTED                      |
| `setOptOut()`                       | `config.optOut`                    |
| `setOffline()`                      | NOT SUPPORTED                      |
| `trackingSessionEvents()`           | `config.defaultTracking.sessions`  |
| `useAppSetIdForDeviceId()`          | `config.useAppSetIdForDeviceId`    |

## Track events

Flutter SDK 4.0 uses a unified `track` API to replace the following `logEvent` API variations:

* `withEventProperties`
* `withApiProperties`
* `withUserProperties`
* `withGroup`
* `withGroupProperties`

### logEvent()

The `logEvent()` API maps to `track()`.

```dart
amplitude.logEvent('BUTTON_CLICKED'); //[tl! --]
amplitude.track(event: BaseEvent(eventType:'BUTTON_CLICKED')); //[tl! ++]
```

### logEvent() with event properties

```dart
amplitude.logEvent('BUTTON_CLICKED', {"Hover Time": "100ms"}); //[tl! --]
amplitude.track(event: BaseEvent(eventType:'BUTTON_CLICKED', eventProperties: {"Hover Time": "100ms"})); //[tl! ++]
```

### logEvent() with outOfSession

`logEvent()` receives an optional boolean argument `outOfSession`. The new `track()` API doesn't support it. You can still track an event as out-of-session by setting `event.sessionId = -1`.

```dart
amplitude.logEvent("BUTTON_CLICKED", outOfSession: true); //[tl! --]
amplitude.track(event: BaseEvent(eventType:'BUTTON_CLICKED', sessionId: -1)); //[tl! ++]
```

### uploadEvents()

The `uploadEvents()` API maps to `flush()`.

```dart
amplitude.uploadEvents(); //[tl! --]
amplitude.flush(); //[tl! ++]
```

## Set user properties

The APIs for setting user properties are the same, except for the removal of `instance()`. Here are code snippets to migrate APIs for user properties.

### setUserId()

`setUserId()` remains unchanged but doesn't receive `startNewSession`.

### setDeviceId()

`setDeviceId()` remains unchanged.

### regenerateDeviceId()

`regenerateDeviceId()` isn't supported in the Flutter SDK 4.0.

### clearUserProperties()

The `clearUserProperties` API has been removed, but you can now use the unified `identify` API to remove user properties. 

```dart
amplitude.clearUserProperties(); //[tl! --]
final Identify identify = Identify() //[tl! ++:2]
  ..clearAll();
amplitude.identify(identify);
```

### setUserProperties()

The `setUserProperties` API has been removed, but you can now use the unified `identify` API to add user properties. 

```dart
- Map<String, dynamic> userProps = { //[tl! --:4]
-   'gender': 'female',
-   'age': '20'
- };
- amplitude.setUserProperties(userProperties);
+ final Identify identify = Identify() //[tl! ++:3]
+                          ..set('gender','female')
+                          ..set('age',20);
+ amplitude.identify(identify);
```

### identify()

You can now make an identify call on `amplitude` without calling `instance()`.

```dart
final Identify identify = Identify()
                          ..set('gender','female')
                          ..set('age',20);
Amplitude.getInstance().identify(identify); //[tl! --]
amplitude.identify(identify); //[tl! ++]
```

## Set group properties

### `setGroup()`

You can now make an identify call on `amplitude` without calling `instance()`.

```dart
// set group with a single group name
Amplitude.getInstance().setGroup("orgId", "15"); //[tl! --]
amplitude.setGroup("orgId", "15");//[tl! ++]
// set group with multiple group names
Amplitude.getInstance().setGroup("sport", ["tennis", "soccer"]); //[tl! --]
amplitude.setGroup("sport", ["tennis", "soccer"]); //[tl! ++]
```

#### groupIdentify()

You can now make an identify call on `amplitude` without calling `instance()`.

```dart
final Identify identify = Identify()
                          ..set("gender", "female")
                          ..set("age", 20);
Amplitude.getInstance().groupIdentify("groupType", "groupValue", identify); //[tl! --]
amplitude.groupIdentify("groupType", "groupValue", identify); //[tl! ++]
```

## Tracking revenue

`logRevenue()` and `logRevenueAmount()` are replaced by `revenue()`.

```dart
String productId = "product001"; //[tl! --:5]
int quantity = 2;
double price = 20;
double amount = 35;
amplitude.logRevenue(productId, quantity, price);
amplitude.logRevenueAmount(amount);
final Revenue revenue = Revenue() //[tl! ++:4]
  ..price = 3.99
  ..quantity = 3
  ..productId = "com.company.productId";
amplitude.revenue(revenue);
```