// ！JavaScript！

// データを取得する
axios.get('/api/get_letters?offset=0')
.then(function (response) {
// データの送信に成功したときの処理をここに書く
    console.log(response);
    // console.log(response.data[i].img);
    var el = document.getElementById("first_lines");
    let html = '';
    for (var i = 0; i < response.data.length; i++) {
        // console.log(response.data[i]);
        html += `
        <a href="../see?${response.data[i].screen_id}">
            <div class="cut">
                <img src="/api/post_letter/images/${response.data[i].img}.jpeg"
                    class="line" />
            </div>
            <img src="img/empty-frame.png"
                class="first_lines"
                alt="" />
        </a>
    `;
 }
    el.innerHTML = `
    <div>${html}</div>
    `;
})
.catch(function (error) {
// データの送信に失敗したときの処理をここに書く
    console.log(error);
});
console.log(axios);
// console.log(html);


// ！jQuery！

// TOPへ戻る
$(function(){
    // #で始まるリンクをクリックしたら実行されます
    $('a[href^="#"]').click(function() {
      // スクロールの速度
      var speed = 400; // ミリ秒で記述
      var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? 'html' : href);
      var position = target.offset().top ;
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
    });
  });