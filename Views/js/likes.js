////////////////////////////////////////////////
// いいね！用のJavaScript
////////////////////////////////////////////////

$(function () {
    // いいね！がクリックされたとき
    $('.js-like').click(function () {
        const this_obj = $(this); // thisオブジェクトにはクリックされた要素が入る。またconstで変数を宣言すると再代入できない
        const tweet_id = $(this).data('tweet-id'); // tweet-idを取得
        const like_id = $(this).data('like-id'); // htmlで書いたdata-like-idが取得できる
        const like_count_obj = $(this).parent().find('.js-like-count');
        let like_count = Number(like_count_obj.html());

        if (like_id) {
            // いいね！取り消し
            // 非同期通信  ajaxはjQueryのメソッド
            $.ajax({
                url: 'like.php',
                type: 'POST',
                data: {
                    'like_id': like_id
                },
                timeout: 10000
            })
                // 取り消し成功  () => { みたいな書き方は名無しの関数。アロー関数とも呼ぶ。一度しか使わない関数はこう表記できる
                .done(() => {
                    // いいね！カウントを減らす
                    like_count--;
                    like_count_obj.html(like_count);
                    this_obj.data('like-id', null);

                    // いいね！ボタン色をグレーにする  .doneと.failで連結されている→メソッドチェーン。 "." で関数を連結する
                    $(this).find('img').attr('src', '../Views/img/icon-heart.svg');
                })
                .fail((data) => {
                    alert('処理中にエラーが発生しました。');
                    console.log(data);
                }); // .ajax .done .fail の3つの()内は上から順に実行される訳ではなく登録だけしてある。3つ並行で実行→()内が実行
        } else {
            // いいね！付与
            // 非同期通信
            $.ajax({
                url: 'like.php',
                type: 'POST',
                data: {
                    'tweet_id': tweet_id
                },
                timeout: 10000
            })
                // いいね！成功
                .done((data) => {
                    // いいね！カウントを増やす
                    like_count++;
                    like_count_obj.html(like_count);
                    this_obj.data('like-id', data['like_id']);

                    // いいね！ボタン色をブルーにする
                    $(this).find('img').attr('src', '../Views/img/icon-heart-twitterblue.svg');
                })
                .fail((data) => {
                    alert('処理中にエラーが発生しました。');
                    console.log(data);
                });
        }
    });
})