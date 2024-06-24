---
id: 7bbfdf40-67c9-4901-9f22-8d51e3bd1ddc
blueprint: japanese_translation
title: よくある質問：Amplitudeの行動コホート
title_en: 'Frequently Asked Questions: Amplitude Behavioral Cohorts'
source: 'https://help.amplitude.com/hc/ja/articles/4402840043789'
---
よくある質問と回答

* [最近導入された特定のプロパティ値でユーザーをグループ化するにはどうすればよいですか？](#h_01EQFSHDF70TFPGA0VGN0RW00K)
* [コホートを作成する際に、CSVファイルが失敗し続けるのはなぜですか？](#h_01EQFSHN36C9H71ZEE3SN8VB3W)
* [コホート定義がグレー表示され、変更できないのはなぜですか？](#h_01EQFSHTBQQTMF1Q305M4P68VW)
* [このコホートが、コホートを経時的にサポートしないのはなぜですか？](#h_01F9YX3MZXV7RH1ANMQ9WY14EH)
* [過去30日間にイベントをX回実行したユーザーのコホートを作成するにはどうすればよいですか？](#h_01F9YXFR7V2T8E554PME5WMKB9)
* [ユーザープロパティがないユーザーまたはイベントを実行しなかったユーザーを特定するにはどうすればよいですか？](#h_01H41AQA1ZSHKT7XBXGWEA4K6N)

### 最近導入された特定のプロパティ値でユーザーをグループ化するにはどうすればよいですか？

これらのユーザーのコホートを作成するには、[**最新**の機能](/docs/analytics/behavioral-cohorts)を使用できます。 これにより、与えられた時間枠で最新のアクティブイベントに特定のプロパティ値を持っていたユーザーを見つけます。 

例えば、ここでAmplitudeは、過去30日間に`国`ユーザープロパティの値として「ドイツ」を持っていたユーザーをクエリしています。

### スクリーンショット

### コホートを作成する際に、CSVファイルが失敗し続けるのはなぜですか？

CSVファイルは、ユーザーIDまたはAmplitude IDのみを含めることができますが、同じファイルに両方を含めることはできません。また、CSVに他の情報を含めることはできません。（[コホートとしてCSVをアップロード](/docs/analytics/behavioral-cohorts)することについては、こちらをお読みください。） CSVには空白やその他のテキストを含める必要があります。ファイルが正しいフォーマットでない場合、Amplitudeはエラーメッセージを表示し、コホートのアップロードを拒否します。

適切にフォーマットされました。CSVファイルは、次のようになります：

![Screen_Shot_2021-07-07_at_10.05.11_AM.png](/docs/output/img/jp/screen-shot-2021-07-07-at-10-05-11-am-png.png)

### コホート定義が変更できないのはなぜですか？

特定のチャート、特にファネルとリテンションチャートからコホートを作成することは可能ですが、これらのコホートからイベントを変更することはできません。 この例では、ステップは存在しますが、変更することはできません。 それらを変更するには、チャートのソースに戻り、そこでステップを変更し、新しいコホートを再作成します。

![スクリーンショット](/docs/output/img/jp/sukurinsiyotuto.png)

### このコホートは、母集団を経時的にサポートしないのはなぜですか？

コホートの母集団は、**動的コホート**に対してのみサポートされています。例えば、指定した基準に従って再計算できるコホートなどです。静的コホートではサポートされていません。静的コホートの例には、...からインポートされたものが含まれます。CSVファイル、すなわちチャート内のマイクロスコープを使用して作成されたものです。

### 過去30日間にイベントをX回実行したユーザーのコホートを作成するにはどうすればよいですか？

コホートでの[**カウント**機能](/docs/analytics/behavioral-cohorts)では、これらのユーザーをセグメント化できます。 次のコホート定義は、過去30日間に`曲またはビデオを再生`したユーザーをセグメント化します。

![スクリーンショット](/docs/output/img/jp/sukurinsiyotuto.png)

### ユーザープロパティがないユーザーまたはイベントを実行しなかったユーザーを特定するにはどうすればよいですか？

ユーザーグループのカスタム定義を作成するには、実行したイベントだけでなく、実行**しなかった**イベントに基づいてユーザーを登録できます。

**注：**`**Count = 0**`または`**Count < 1**`を含むクエリは処理されず、ユーザーゼロを返します。

特定のイベントを実行したユーザー、または特定のプロパティがないユーザーを特定するには、以下に説明するプロセスの1つに従ってください。 

#### 過去30日間にプロダクトを使用していたが、イベントAを完了しなかったユーザーを特定する

Amplitudeは、イベントベースのアナリティクスプラットフォームであり、行動コホートは、選択した時間枠内にAmplitudeで少なくとも1つのイベントをトリガーしたユーザーのみを特定できます。

しかし、過去30日間にプラットフォームでキーイベントをトリガー**しなかった**ユーザーを理解したい場合はどうなりますか？ この例では、AmpliTunesはプロダクトであり、`お気に入りの曲または動画`は関心のあるキーイベントです。このコホートを作成するには、コホートに2番目のイベントを追加するときに、オプションとして存在する`did not`句を使用できます。

![behavioral_cohorts_faq_0.png](/docs/output/img/jp/behavioral-cohorts-faq-0-png.png)

これは、過去30日間に少なくとも1回`お気に入りの曲または動画`をトリガーしたユーザーを除外します。これは、このイベントをトリガーしなかったユーザーを特定するのに役立ちます。

#### 過去30日間に特定のユーザープロパティがないユーザーを特定する

もう1つの一般的なシナリオは、過去30日間に任意の時点で有料ユーザーにならなかったすべてのアクティブユーザーを特定することです。 これを行うには、もう一度、`did not`句を使用します。

![behavioral_cohort_faq_1.png](/docs/output/img/jp/behavioral-cohort-faq-1-png.png)

過去30日間の任意の時点で`Paying = false`を持っていたユーザーを特定するのではなく、同じ時間枠で`Paying = true`を持って**いなかった**ユーザーを特定する必要があります。これは、30日の時間枠全体を通して支払わなかったユーザー*のみ*を知るためです。

ユーザーが月初に有料ユーザーではなかったが、今月末までに有料ユーザーになった場合、過去30日間の*任意の時点*に`Paying = false`を持っていたユーザーをクエリして識別します。

[Amplitudeのコホート](/docs/analytics/behavioral-cohorts)の詳細情報については、こちらをお読みください。