---
id: 31ec70d4-4196-46b5-988c-91b03eebef7e
blueprint: japanese_translation
title: ファネル分析を解釈する
title_en: 'Interpret Funnel Analysis'
source: 'https://help.amplitude.com/hc/ja/articles/360053338671'
---
#### この記事のテーマ：

* ファネルコンバージョンを表示および解釈する
* 時間の経過に沿ってコンバージョンをトラックする
* A/Bテストでベースラインに対してバリアントをテストする
* セッションベースのファネルを作成する

Amplitudeの**ファネル分析チャート**は、プロダクト内で定義されたパス（「ファネル」）を、ユーザーがどのようにナビゲートするかを理解し、ユーザーがドロップオフする傾向がある問題領域を特定します。

この記事では、ファネル分析チャートの指標モジュールがどのように機能するか、そしてモジュールの中のデータをどのように解釈するべきかを説明します。

ファネル分析データの分析は画面下のパネルで行われます。

## 開始する前に

[Amplitudeのファネル分析チャートの概要](/docs/analytics/charts/funnel-analysis/funnel-analysis-build)に関するヘルプセンターの記事をまだお読みでない場合は、続行する前にそれらの記事をお読みください。

## ファネル分析チャートを解釈する

ファネル分析チャートを解釈するのは、思っているよりもずっと簡単です。パラメーターを文章のように読むことができるからです。

例えば、次のチャートでは（1）任意のユーザー、（2）これらすべてのイベントをトリガーしたユーザー、（3）前記の順番でトリガーしたユーザー、（4）初期イベントをトリガーしてから1日以内のユーザー、を表示します。

![funnel_no_steps.png](/docs/output/img/jp/funnel-no-steps-png.png)

これらのすべてのパラメーターと他の多くのものも同様に、簡単に変更が可能で、分析のニーズを反映することができます。

このセクションの残りの部分では、ファネル分析に適用されるときの指標モジュール、すべてのパラメーターオプションが意味するもの、そして望むデータを生成するためにそれらをどのように使うかについて説明します。

### 時間オプションを設定する

Amplitudeでファネル分析の時間枠を指定するのは簡単です。

* **…内で完了:**これはコンバージョンウィンドウを設定する場所です。これはファネルに入ってコンバージョンするまでユーザーがかかった最大時間の長さです。デフォルトのコンバージョンウィンドウでは、1日です（UTC）これは、Amplitudeは、ユーザーがファネルに入ってから1日以内に完了した場合、そのユーザーをコンバージョンしたものとしてカウントするという意味です。それ以上の期間の場合は、カウントされません。最小コンバージョンウィンドウの長さは1秒で、また、最大は366日です。
* **any day(任意の日):**これは新規のユーザーファネルのみに適用されます。ドロップダウンから*any day(任意の日)*を選択した場合、ファネルには、選択された日付範囲の任意の時点で、ファネルの最初のステップを実行した新規ユーザーが含まれます。
* **初日:**新規ユーザーファネルで、初日を選択した場合、ファネルは、Amplitude（新規ユーザーの日付）に表示される最初の日に最初のイベントを発行する（ファネルに入る）ユーザーに制限されます。

![completed_within.png](/docs/output/img/jp/completed-within-png.png)

デフォルトでは、Amplitudeは、イベントが1秒以内にトリガーされないと仮定します。しかし、複数のイベントが同時に発行する場合など、より詳細な時間の解決が必要になる場合があります。これらのケースでは、Amplitudeは、ミリ秒ごとにイベントを解決することができます。

![millisecond.png](/docs/output/img/jp/millisecond-png.png)

*アドバンスト*ドロップダウンで*ミリ秒解像度*を確認するだけです。

**注意:** この設定は、分散またはマルチスレッド環境でクライアントイベント時間を生成する場合に、問題を起こす可能性があります。支援が必要な場合は、Amplitudeのサポートに連絡します。

### コンバージョン

ファネル分析チャートのデフォルトのオプション、コンバージョングラフは、ファネルの各ステップにクリックしたユーザーの数を詳述した棒グラフです。

![conversion.png](/docs/output/img/jp/conversion-png.png)

上のチャートでは、過去30日間でイベント`ユーザーサインアップ`をトリガーした229,324人のユーザーが存在しました。 そのうち、173,093は、アイテムの詳細を表示してから30日以内に`楽曲または動画を検索`しました。 また、元のグループの28,472人の`ユーザーサインアップ`から30日以内に`チケットを購入する`をトリガーしました。

棒グラフは、各ステップでコンバージョンしたユーザーの数を示しているだけでなく、ファネルの特定のステップでドロップしたユーザーの数を示しています。前者は、棒グラフの固形領域によって表示され、後者は上部の縞模様の領域で表示されます。

チャートの直接下にあるデータにあるデータのテーブルビューには、次のような追加のコンテキストがあります:

* **コンバージョン:** ファネル全体を正常に完了したユーザーの割合です
* **[イベント名]：** ファネルでそのステップを完了したユーザーの数です。 ファネルには、ファネルがその最初のイベントをトリガーしたユーザーのみが含まれているため、最初のステップは常に100%になります。
* **平均時間:** ユーザーがファネル内のあるイベントから別のイベントに移動するのにかかる平均時間です。これは、ユーザーの*最初*のコンバージョン時間に基づいています

**注意:**ファネルチャートにgroup byを適用した場合、*平均時間*の列は「N/A」になります。平均時間と中間期の時間は、1日、/週/毎月のステップ遷移で計算されないためです。

ユニークユーザーの代わりに、イベント合計でコンバージョンをカウントすることもできます。

![totals.png](/docs/output/img/jp/totals-png.png)

### 時間経過のコンバージョン

時間経過のコンバージョングラフは、**特定の日に**ファネルに入ったユーザーのコンバージョン率を示しています例えば、ユーザーが1月1日にファネルに入り、1月5日にファネルでコンバージョンした場合、1月1日のバケットでカウントされます。これはその日にファネルに入ったからです。

ここに表示された割合は、特定のユーザー当たり、1日/週/月あたりのコンバージョンです。例えば、ユーザーが7月1日と7月2日の両方で最初のステップを発行してファネルに入り、両方の日付から30日以内にファネルを完了した場合、そのユーザーは7月1日と2日のコンバージョン割合でカウントされます。

このグラフは、ファネルステップ間のコンバージョン率を表示することもできます。ユーザーは、この分析に含めるために**ファネル全体を完了する必要はありません**。代わりに、関心のある最後のステップまでのすべてのステップ（およびそれを含む）を完了する必要があります。

例えば、このチャートを見てみます:

![overtime.png](/docs/output/img/jp/overtime-png.png)

この3ステップ内では、Amplitudeがこのプロセス（この例では、ステップ1からステップ2、またはステップ2からステップ3）の**二つのステップ**間で、**または**ステップの**二つのペア**の間でファネル**全体**を通じたコンバージョン率**を**表示しています。例えば、`1: ユーザーサインアップをして、2: 楽曲またはビデオを検索`する場合、ステップ3を完了したか否かに関わらず。2つのステップすべてを選択したユーザーが対象となります。

Amplitudeは、上のスクリーンショットに示すように、下の測定モジュールで各選択のコンバージョングラフを表示します。

これが4ステップのプロセスである場合、ステップ2からステップ3へのコンバージョンは、4を完了したかどうかに関係なく、プロセスの最初の3つのステップを完了したすべてのユーザーを含みます。ユーザーは、常に**、最初のステップでファネルを入力**する必要があります。

**注意:**その場合も、時間の経過のコンバージョンは、すべてのアクティブユーザーをカウントします。

### コンバージョンする時間

コンバージョンする時間は、ファネルで1つのステップから次ステップに移動するのにどのくらい時間がかかるかを示します。

![time_to_convert.png](/docs/output/img/jp/time-to-convert-png.png)

Amplitudeは、選択したコンバージョンウィンドウとルックバックウィンドウに応じて、バケットサイズ（1秒、10秒、1分、1時間）を自動的に選択します。 表示されるコンバージョンの中央値は、ファネル全体です。

縦軸の割合は、特定のインターバル内でコンバージョンしたユーザーの割合を表します。これは、選択された時間範囲内でコンバージョンしたすべてのユーザーの数と比べたものです。

必要に応じて、カスタムビンを作成することもできます:

![buckets.png](/docs/output/img/jp/buckets-png.png)

カスタムバケットを作成する場合、返されたパーセンテージは、バケットの最小と最大の値の間に入るユーザーのみを使用して計算されます。

**注：** 中央値バーは、バケットの最小値と最大値に関係なく、完全なデータセットに基づいて計算されます。

ヒストグラムビューから新しい時系列に切り替えることもできます。これは、経時変化を変換する中央値の時間を示しています。*配布*ドロップダウンをクリックして、*時間経過*を選択します。

コンバージョンする時間のデフォルトの範囲はファネル全体ですが、先のセクションで説明したように、ファネルで2つの連続したステップに制限することもできます。

### 実行回数分布

頻度チャートは、別の特定のイベントを初めてトリガーする前に、1つのイベントをファネルでトリガーしたユーザー数を把握するのに役立ちます。下の画面ショットに示されたように、指標モジュールで分析しようとする2つのイベントを選択できます。

例えば、次の例では、ファネル3に到達したユーザーの71.8%が、1日間の期間内に、チケットまたは動画を購入する前に、`「曲または動画を検索」`イベントを1回のみトリガーしています。

![frequency.png](/docs/output/img/jp/frequency-png.png)

## A/Bテスト

**注意:**計装のヒントを含むベストプラクティスについては、[AmplitudeでA/Bテスト結果を分析する方法](/docs/get-started/analyze-a-b-test-results)の記事を参照してください。  

また、A/Bテストは、グロースとエンタープライズのプランの顧客にのみ使用できます。

Amplitudeでは、A/Bテストは、2つ以上のユーザーセグメントのファネルコンバージョンパフォーマンスを互いに比較できます。**改善**の観点から結果を表示できます。これは、ベースラインと比較されるセグメントのパフォーマンスを記述します。あるいは、**統計的有意性の**観点から、コントロールと処置が同じ意味を持つことを前提として、目撃したものと同様に極端な差を観察する確率を示します。

Amplitudeは、デフォルトでは、ファネル分析に追加された最初のセグメントをベースラインとして使用しますが、*ベースラインセグメント*がドロップダウンメニューに設定されている場合に、これを変更することができます。

![baseline_segment.png](/docs/output/img/jp/baseline-segment-png.png)

### A/Bテスト -改善

このチャートは、ファネルのすべてのステップ全体で、各セグメントのコンバージョン率を表示します。A/Bテストでは1つ以上のバリアントがありますが、ベースラインは1つのみです。

### A/Bテスト -意義

このチャートは、各バリアントの予測された可能性を示します。高い値は、バリアントがベースラインを超えたことを示しています。低い値は、そうでないことを示しています。

これらの結果に以下が含まれる場合：

* 比較される両方のバリアントについて、30件超のサンプルサイズ
* 両方のバリアントで、サンプルサイズ\*コンバージョン率> = 5**および**サンプルサイズ\*（1コンバージョン率）>= 5
* 95%以上の有意性

Amplitudeは、結果を重要とみなします。

[Amplitudeがどのように計算する可能性と統計的意義](https://help.amplitude.com/hc/en-us/articles/360053484751)についての詳細を参照してください。

### 内訳テーブル

チャートの下のデータテーブルは、データの内訳を示します。Amplitudeのすべてのデータテーブルと同様に、データをCSVファイルとしてエクスポートできます。含まれる列は次のとおりです:

* **カウント:**ファネルに入ったユーザーまたはグループの数。
* **コンバージョン:**すべての満たされた条件でファネルですべてのステップを完了したユーザーまたはグループの数。
* **%コンバージョン:**ファネルに入ったユーザーまたはグループの数で割った、コンバージョンしたユーザーまたはグループの数。
* **ベースラインを超える%の改善：**これは、数式（そのバリアントの%コンバージョン - ベースラインの%コンバージョン）/（ベースラインの%コンバージョン）で計算されます。データテーブルのパーセントは、値が肯定的な数字である場合は、緑色になります。
* **重要性：**これは、各テストバリアントで表示されるパフォーマンスが、データのランダムな変動によるものではなく、**実際には**ゼロと異なる可能性です。この値が高いほど、結果に対してさらに自信が持てるようになります。よりフォーマルに、これは*1 - p値*として記述できます。

## プロパティ定数とセッションベースのファネルを保持する

デフォルトでは、Amplitudeは、ファネル分析でプロパティ定数を保持しません。これは、ファネルチャートが、ファネルを**1回以上**通過した**ユーザーのユニークカウント**を表示することを意味します。例えば、ユーザーがファネル全体を複数回通った場合、1回のみとカウントされます。

次のチャートでは、ユーザーが最終日にこのファネル（`アイテムを表示` →カー`トに追加` →`購入完了`）を10回変換した場合、1回しか表示されません。

![constant_props.png](/docs/output/img/jp/constant-props-png.png)

ただし、プロパティ定数を保持する場合、ファネルチャートは、ファネルを完了した**ユーザーとユーザー/イベントプロパティペアのユニークカウント**を表示します。ユーザーがYの異なるイベントプロパティの値で、ファネル全体をX回通った場合、ユーザーはY回数にカウントされます。

例えば、ユーザーが、`アイテム詳細を表示` -> カー`トにアイテムを追加` -> 購入を`完了`する10の異なる`Item_ID`プロパティ値で変換した場合、チャートに10回表示されます。 ここでは、`Item_ID`はファネルで3つのイベントすべてに送信されたイベントプロパティです。 ファネルの**すべてのイベント**に計装した場合**、イベントプロパティは、定数にのみを保持できます**。

この方法を使用して、セッションベースのファネルを構築できます。これを行うには、ここに示すように、定数の`![amplitude_logo.png](/docs/output/img/jp/amplitude-logo-png.png)セッションID`を保持します。

![hold_prop_constant.png](/docs/output/img/jp/hold-prop-constant-png.png)

ユーザーは、コンバージョンするには、同じセッションIDのファネルで各ステップを完了する必要があります。この設定のファネル分析チャートは、ユーザーが異なるセッションで複数回ファネルを完了できるため、ユニークユーザーを表示しません。

## イベントとユーザープロパティ（グループバイ）によるコンバージョン

ファネルの特定のステップで、イベントプロパティ値によるコンバージョンを分割するようにファネルを設定できます。これは、プロパティ値が、コンバージョンにどのような影響を与えるかを理解するのに役立ちます。

下の例では、3段階のファネルは、ステップ2のイベントプロパティ、`item_id`でグループ化されています。

![group_by.png](/docs/output/img/jp/group-by-png.png)

グラフは、各`item_id`値で分類された、ステップ2（`カートにアイテムを追加`）イベントをトリガーしたユーザーのコンバージョン分布を示しています。

最初のステップ以外のステップでグループ化することを選択した場合、セグメント化されたステップに到達しなかったユーザーのセグメント（この例では、「ステップに到達しなかった」については青色のセグメント）も表示されます。

**注**：ファネルのユーザーが複数回ステップを完了できる場合、この方法は各イベントの最初の発生を受け、そのイベントの値でユーザーをバケットに入れます。

## コンバージョンドライバー

コンバージョンドライバーオプションでは、ファネルのステップ**間の**ユーザーが行った行動を確認できます。これは、コンバージョン、またはドロップオフの潜在的なドライバーを明確に特定するのに役立ちます。詳細は、[Amplitudeのコンバージョンドライバ](/docs/analytics/charts/funnel-analysis/funnel-analysis-identify-conversion-drivers)のヘルプセンターの記事を参照してください。