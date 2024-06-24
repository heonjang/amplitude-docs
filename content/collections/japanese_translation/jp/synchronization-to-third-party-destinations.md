---
id: 8e74e428-7a75-45fc-90b3-61a389872542
blueprint: japanese_translation
title: サードパーティデスティネーションへの同期
title_en: 'Synchronization to third-party destinations'
source: 'https://help.amplitude.com/hc/ja/articles/360060055531'
---
|  |
| --- |
| **この記事は役立ちます:*** 推奨で同期を設定および管理する
 |

Amplitudeは、計算、プロパティ、コーホート、推奨の2種類の同期をサポートしています: **オンデマンド**と**自動化**です。オンデマンド同期は、アドホックとワンタイム同期です。これは、オーディエンステストとワンオフキャンペーンに役立ちます。自動同期は、毎日または1時間のケイデンスでスケジュールされます。そのため、コーホートオーディエンスメンバーシップが変更されると、またはユーザーの基本予測確率が変更されると、Amplitudeは接続デスティネーションでのコーホートメンバーシップを自動的に調整します。

ユーザーがアプリでアクションを実行した場合、CSVダウンロードまたは手動同期は不要です。ユーザーは、それぞれの広告、電子メール、またはテストプラットフォームに自動的に同期されます。

## 新しい同期を作成する

新しい同期を作成するには、次のステップに従ってください:

1. *[+新規]*をクリックし、*[同期]*タイルをクリックします。*[新しい同期の作成]*モーダルが表示されます。  
  
![syncs.gif](/docs/output/img/jp/syncs-gif.gif)
2. 作成する同期タイプ(コーホート、推奨、ユーザープロパティ、計算同期)を選択し、*[次へ]*をクリックします。
3. ドロップダウンリストから、同期する特定のアイテムを選択します。次に、*[次へ]*をクリックします。
4. 設定する同期のタイプを選択します。コーホートでは、使用可能な同期タイプは、広告、電子メール、実験、データです。ユーザープロパティと計算の場合、電子メールまたはデータ同期を設定できます。推奨は、データ同期のみと互換性があります。
5. 次に、同期するデスティネーションを選択します。希望デスティネーションが表示されない場合は、*+デスティネーションを追加*または*管理*をクリックし、そこに[希望のデスティ](https://help.amplitude.com/hc/en-us/articles/360044835531)ネーションを設定します。次に、*[次へ]*をクリックします。
6. ワンタイム同期または繰り返し同期のいずれかを選択します。繰り返し同期の場合は、毎時間または毎日の同期のいずれかを必ず指定してください。  
  
また、ステップ5の選択に応じて、顧客アカウントまたはAPIターゲットを指定して同期する必要があります。
7. *[同期]*をクリックします。これで、同期が有効になりました。

### 同期の詳細を表示する

同期が作成されたら、同期の名前の横にある*[履歴]*をクリックすると、すべての同期の重要な詳細が表示されます。

![sync_detail_1.gif](/docs/output/img/jp/sync-detail-1-gif.gif)

ここで、同期のタイプ、同期のログの最新セグメント、およびそれが遭遇したエラーのリストを迅速に表示することができます。同期エラーが発生するときは常に、これを最初に見てください。