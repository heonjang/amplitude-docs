---
id: 67940e87-0935-4d91-a32e-2ffa8e63bcad
blueprint: japanese_translation
title: インサイト：アラートで指標に異常をすばやくスポットする
title_en: 'Insights: Quickly spot anomalies in metrics with alerts'
source: 'https://help.amplitude.com/hc/ja/articles/115001764612'
---
この記事のテーマ：

* アラートを設定して管理し、重要なプロジェクト指標のパフォーマンスを監視する

Amplitudeの**アラート**機能は、高度なデータマイニングと機械学習技術である[Prophet](https://facebook.github.io/prophet/)を使用して構築され、プロダクトデータの異常を自動的に検出し、これらの隠されたトレンドを即座に注意喚起します。 これは、最初に期待値とそれらの周りの信頼区間を識別し、次に、データの全体的な傾向を分析し、データの週次トレンドと組み合わせることによって行います。 

## 開始する前に

アラートは、エンタープライズ顧客に含まれ、インサイトアドオンを購入した成長顧客に利用できます。 Amplitudeサブスクリプションをアップグレードする場合は、CSMにお問い合わせください。

第二に、注意すべきアラートに関するいくつかの詳細があります：

* 複数のイベントとユーザーセグメントのアラートを同時に設定できます。
* プロパティでグループバイを使用している場合、アラートは、トップ1000セグメントのみに対する指標をトラックします。
* 現在、カスタムアラートは、[イベントセグメンテーション](https://help.amplitude.com/hc/en-us/articles/230290208-Amplitude-2-0-Event-Segmentation)と[ファネル分析](https://help.amplitude.com/hc/en-us/articles/229951267-Amplitude-2-0-Funnel-Analysis)チャートで、日次または時間ごとの頻度に設定されたチャートでのみ利用できます。 時間別アラートは、エンタープライズプランまたはインサイトアドオンを備えた成長プランの顧客のみ利用できます。
* ファネル分析は、アラートをサポートするために、経時的にコンバージョンを測定する必要があります。
* イベントセグメンテーションチャートで、週次または月次KPIをトラックする必要がある場合は、7日間または30日間のローリングウィンドウを使用します。 また、アラートは、[頻度]と[数式]タブ、または[棒チャートビジュアライゼーション]ではサポートされていません。一部のカスタム数式は、X軸時系列のチャートを生成する限り、サポートされています。
* チャート所有者だけがアラートを設定できます。 アラートを受信するチャートが既に存在しているが、他の誰かによって作成された場合は、コピーを作成し、アラートを設定する前に保存します。 さらに、チャートに加えた変更は、アラートトラッキングに自動的に適用されます。

自動モニターは、Amplitudeにログインするすべてのイベントでセットアップされ、「異常と予期しないトレンドのイベントをすべてトラックします」  これらの場合、ユーザーはセットアップを制御できません。 イベントは、過去30日間の少なくとも15日に1日あたり100以上のイベントボリュームを持つと、異常として監視されます。 これらの異常は、値が履歴データの99％信頼区間外になったときに検出されます。

## アラートを設定する

Amplitudeには、**自動**、**カスタム**、**スマート**の3種類のアラートがあります。

Amplitudeで計測するすべてのイベントに対して、**自動**アラートが設定されます。 これは、異常と予期しないトレンドのすべてのイベントをトラックするように設計されています。 これは自動的に発生します。自動アラートを設定するには、何もありません。

Amplitudeは、過去30日間の少なくとも15日に1日あたり100以上のイベントボリュームを達成すると、異常のイベントを監視します。 Amplitudeは、イベントの値が履歴データの99％信頼区間外になったときに異常が発生したと見なします。自動モニターには、120トレーニング日を使用します。

異常が検出されたときに**自動**アラートを購読してメールを受信するには、*[設定]>[プロジェクト]*に移動し、監視するプロジェクトを見つけて、*[自動モニタ]*タブを開きます。*[購読しない]*トグルを*[購読]*に切り替えます。

所有するチャートの**カスタム**またはスマート**アラート**を設定するには、次のステップに従ってください：

1. アラートを設定するチャートに移動します。 注意：チャートは、アラートを設定する前に保存する必要があります。
2. *[詳細]*ドロップダウンメニューから*[アラートを設定]*を選択し、**スマート**アラートまたは**カスタム**アラートを選択します：

![conf_interval.gif](/docs/output/img/jp/conf-interval-gif.gif)

* * * * **スマートアラート**は、99％信頼区間外の予期しない変更を探します。
			* **カスタムアラート**では、カスタムアラートを受け取る条件について、より具体的に設定することができます：特定の値の上か下か、または以前の値と指定された量で異なるかどうかなどの設定ができます。信頼区間に基づいてカスタムアラートを設定することもできます。

3. カスタムアラートを設定する場合は、アラート条件を指定します（これらは、チャートの現在の値を超過または特定の値未満、または信頼区間の変更に結び付けられます）。 スマートアラートを設定する場合は、このステップをスキップします。
4. このアラートを受信する全員のメールを追加し、*[アラートを設定]*をクリックします。

カスタムまたはスマートアラートでは、トレーニング日は、日次インターバルチャートでは120日、時間別インターバルチャートでは14日です。

### カスタムアラートにおける信頼区間と統計的有意性

カスタムアラートを設定する場合、有意性しきい値（95％、98％、99％）が違反した場合にアラートを受信することを選択できます。 これらの信頼区間は、履歴データを取得し、すべてのデータポイントの95％、98％、99％が該当する場所を識別することによって決定されます。

![conf_int.jpeg](/docs/output/img/jp/conf-int-jpeg.jpeg)

必要な重要性が高いほど、アラートは「うるさいだけではない」ものになります。 チャートでは、青色のバンドは、信頼区間の範囲を表します。 99％信頼区間は、より多くの履歴データポイントをキャプチャするため、99％信頼区間よりも狭い帯域になります。

## アラートを表示して管理する

左側のサイドバーの*[通知]*をクリックして、*[アラート]*タブを開くと、プロジェクトの**最近トリガーされた**アラートのリストを見ることができます。**[プロジェクト]**を![gear_icon_for_settings.png](/docs/output/img/jp/gear-icon-for-settings-png.png)*クリックして*、関心のあるプロジェクトを選択し、*[カスタムモニター]*または**[自動モニター]**（*スマート*アラート）タブを開くことで、プロジェクトの**すべての既存の**アラートのリストを表示できます。アラートをクリックして、編集または管理します。

## アラートメール

アラートがトリガーされると、Amplitudeは、受信するように指定された全員にメールを送信します。 このメールは、プロジェクトの日次指標のタイムゾーンで午前8時までに送信されるか、または1時間毎の指標に異常が検出された時間後までに送信されます。

![insights_email.png](/docs/output/img/jp/insights-email-png.png)

メールのチャートをクリックして、Amplitudeでそのチャートに直接移動します。Amplitudeがアラートした問題を繰り返すサイドパネルが表示されますので、その瞬間に重要なコンテキストを失うことはありません。

**注**：アラートメールで送信されたチャートには、アラートがトリガーされた正確な時刻のデータポイントの値を表示するためのserver\_upload\_timeフィルタがある場合があります。データポイントによっては、アラートメールの値は、データポイントの終了または最終値とは異なる可能性があることに注意することが重要です。