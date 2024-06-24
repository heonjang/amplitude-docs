---
id: 64f1abb3-2630-4f3b-a324-57657a6d2887
blueprint: japanese_translation
title: 無効または誤ったデータを削除する
title_en: 'Delete invalid or erroneous data'
source: 'https://help.amplitude.com/hc/ja/articles/16805784778907'
---
#### この記事は、次の場合に役立ちます：

* ドロップフィルタとブロックフィルタの違いを理解する
* イベントまたはプロパティをブロックして削除する方法を学ぶ

Amplitude Dataには、Amplitude分析に無効または誤ったデータが表示されるのを防ぐためのいくつかの方法があります。 ドロップフィルタを作成する、ブロックフィルタを作成する、またはイベントとプロパティをブロックする、またはイベントとプロパティを削除するといった方法があります。この記事では、各テクニックとそれらの違いについて説明します。

## ドロップフィルタを作成する

場合によっては、間違ったデータを読み込んでしまい、それをクエリから除外したいことがあるでしょう。Amplitude Dataの**ドロップフィルタ**機能では、クエリ時にチャートから特定のイベントデータを削除できます。これらのイベントは消去される訳ではありません。ドロップフィルタを編集または削除するだけで、チャートに復元できます。ドロップフィルタは、データエクスポートには適用されません。

**注意：**ドロップフィルタは、データ取り込み中に適用されないクエリ側フィルタなので、イベントボリューム制限には**影響しません**。

ドロップフィルタを作成するには、次のステップに従ってください：

1. フィルタへは他のブランチからアクセスできないため、`メイン`であることを確認してください。
2. 左側のサイドバーで、*[フィルタ]*をクリックし、[ドロップフィルタ]タブを*選択します。*
3. *[+ドロップフィルタを作成]*をクリックして、フィルタ設定フライアウトパネルを開きます。
4. このフィルタを適用する環境を選択し、ドロップするイベントを指定します。
5. [プロパティを選択…]を*クリックして*、フィルタを絞り込む関連プロパティを含めます。例えば、特定の地理的な場所からのすべての購入イベントをフィルタしたい場合などです。プロパティのリストから、その場所を選択すればよいだけです。  
  
**注意：**ドロップフィルタには比較演算子（「含む」など）を使用できないため、正確な文字列を使用して、値を一致させる必要があります。
6. Amplitude Dataをドロップフィルタするイベントの時間範囲を指定します。  
  
![amplitude](/docs/output/img/jp/amplitude.png)
7. 準備ができたら、*[データをドロップ]*をクリックして、ドロップフィルタを開始します。

ドロップフィルタを編集する場合は、ドロップフィルタリストでその名前をクリックします。右側に表示されるフライアウトパネルで、編集を行い、*[ドロップフィルタを更新]*をクリックします。

**注意：**ドロップフィルタは、ユーザーアクティビティビューには影響しません。

## ブロックフィルタを作成する

ブロックフィルタを設定することもできます。 これは、ドロップフィルタでフィルタされたデータは回復可能である一方で、**ブロックフィルタでフィルタされたデータは**最初に取り込まれることがないため、回復できないという点でドロップフィルタとは異なります。

ブロックフィルタを使用して、個々のイベントまたはプロパティをブロックできますが、**IPアドレスでデータをブロック**する場合に特に便利です。

ブロックフィルタを使用して特定のイベントまたはプロパティをブロックしている場合、**インストルメンテーションを更新して**、不要なデータを送信しないようにする必要があります。

ブロックフィルタを作成するには、次のステップに従ってください：

1. フィルタへは他のブランチからアクセスできないため、`メイン`であることを確認してください。
2. 左側のサイドバーの*フィルタ*をクリックし、[ブロックフィルタ]*タブ*を選択します。
3. [+ブロックフィルタを作成]を*クリックして*、フィルタ設定フライアウトパネルを開きます。
4. フィルタを適用する環境を選択します。
5. イベント、イベントプロパティ、ユーザープロパティをフィルタするかどうかを指定します
6. フィルタを、イベント名またはプロパティ名、IPアドレス、バージョンに基づいて適用するかどうかを指定します。 次に、フィルターのパラメータの残りの部分を設定します。  
  
![amplitude](/docs/output/img/jp/amplitude.png)
7. 準備ができたら、*[データをブロック]*をクリックし、ブロックフィルタを開始します。

## イベントとプロパティをブロックする

ブロックすることで、Amplitude Dataが、特定のイベント、イベントプロパティ、ユーザープロパティのデータ収集をしないようにすることができます。Amplitude Dataはブロックを解除するまで、そのイベントまたはプロパティのデータ処理を直ちに停止します。

**注：**Amplitude Dataは、ブロックされたイベントまたはプロパティのデータを収集しないため、**将来それらに関する**情報を**回復することはできません**。 特定のイベントまたはプロパティを表示したくないが、いつかこのデータが必要になると思われる場合は、イベントまたはプロパティを**非表示**にすることを検討してください。

イベントまたプロパティをブロックするには、次のステップに従ってください。

1. メインブランチにいることを確認してください。 そこからイベントとプロパティのみをブロックできます。
2. どれをブロックするかに応じて、*イベント*または*プロパティ*に移動します。
3. ブロックするイベントまたはプロパティを検索して、その名前の横にあるチェックボックスをクリックします。
4. イベントをブロックする場合は、*[ブロック]*ドロップダウンメニューをクリックし、*[今すぐブロック]*または*[ブロックをスケジュール]*を選択します。 プロパティをブロックする場合は、![block.png](/docs/output/img/jp/block-png.png)をクリックします。
5. 確認モーダルが表示されます。確認後、イベントまたはプロパティのブロックを決定した場合は、*[ブロック]*をクリックします。
6. ブロックしたイベントのブロックを解除するには、ステップ1～5に従い、*[ブロック]*ではなく、*[ブロックを解除]*をクリックします。

[Amplitudeにおけるイベントまたはプロパティの「非表示」、「ブロック」、「削除」の違い](https://help.amplitude.com/hc/en-us/articles/360059279291-FAQ-What-s-the-difference-between-hiding-blocking-and-deleting-an-event-or-property-)に関しては、ヘルプセンターの記事を参照してください

**注：** **カスタム**イベントをブロックすることはできません。

## Amplitude Dataでイベントとプロパティを削除する

Amplitude Dataのトラッキングプランの一部であるイベントまたはプロパティが大きくなりすぎた場合は、それらを簡単に削除できます。

イベントを削除すると、イベントが取り込まれず、チャートドロップダウンからイベントが削除されます。これは、イベントでそれ以上クエリができなくなることを意味します。注意：イベントまたはイベントプロパティを削除すると、履歴データに表示されます。イベントを削除するということは、Amplitudeがそのイベントのデータを収集しなくなり、イベントが月次イベント量または実装[制限](https://help.amplitude.com/hc/en-us/articles/115002923888)にカウントされなくなることを意味します。また、実装を更新して、削除されたイベントタイプの送信を停止しなけれななりません。

ユーザープロパティを削除しても、**既に取り込まれているイベントのプロパティは削除**されません。これは、ユーザーのイベントストリーム内の過去のイベントには、ユーザープロパティデータがまだ含まれていることを意味します。

**注：**`メイン`でイベントまたはプロパティを削除することはできません。

不要のイベントとイベントプロパティを削除するには、次のステップに従ってください：

1. 新しいブランチを作成する、または`メイン`ではない既存のブランチを開きます。
2. 削除するイベントまたはイベントプロパティを検索して、その名前の横にあるチェックボックスをクリックします。
3. [削除]をクリックします。
4. 確認モーダルが表示されます。これにより、確認フレーズを入力して、削除プロセスを続行するよう指示されます。テキストボックスに入力し、*[削除]*をクリックします。

![delete_one_event_data.png](/docs/output/img/jp/delete-one-event-data-png.png)

イベントまたはプロパティを非表示、ブロック、または削除するかどうかを決定したいときにサポートが必要な場合には、[この記事](https://help.amplitude.com/hc/en-us/articles/360059279291-FAQ-What-s-the-difference-between-hiding-blocking-and-deleting-an-event-or-property-)を参照して、各ステータスの違いを確認してください。