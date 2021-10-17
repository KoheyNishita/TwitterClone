////////////////////////////////////////////////
// いいね！用のJavaScript
////////////////////////////////////////////////

$(function () {
    // いいね！がクリックされたとき
    $('.js-like').click(function () {
        const this_obj = $(this); // thisオブジェクトにはクリックされた要素が入る。またconstで変数を宣言すると再代入できない
        const like_id = $(this).data('like-id'); // htmlで書いたdata-like-idが取得できる
        const like_count_obj = $(this).parent().find('.js-like-count');
        let like_count = Number(like_count_obj.html());

        if (like_id) {
            // いいね！取り消し → カウント減らす
            like_count--;
            like_count_obj.html(like_count);
            this_obj.data('like-id', null);

            // いいね！ボタン色をグレーにする
            $(this).find('img').attr('src', '../Views/img/icon-heart.svg');
        } else {
            // いいね！付与 → カウント増やす
            like_count++;
            like_count_obj.html(like_count);
            this_obj.data('like-id', true);

            // いいね！ボタン色をブルーにする
            $(this).find('img').attr('src', '../Views/img/icon-heart-twitterblue.svg');
        }

// if文で「いいねした場合」と「いいねを取り消した場合」の順番を逆にしたら正常にプラスされたが、取り消せずプラスされ続ける
    });
})