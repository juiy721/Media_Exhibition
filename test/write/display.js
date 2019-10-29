// axiosを組み込む

axios.get('api/update')
      axios.get('api/get?id=3')
        .then(function(response) {
          // 成功したとき 
          console.log(response);
  
      const pv = response.data[0].pv;
  
      document.querySelector('#js-pv').innerHTML = pv;
        })
        .catch(function(error) {
          // 失敗したとき
        });

// 送ったデータをconsoleに表示させる

const input = document.querySelector('#screen_name #age');
const select = document.querySelector('#info-sex3');
// const input = document.querySelector('');
const canvas = document.querySelector('#myCanvas');
const form = document.querySelector('#js-form');

form.addEventListener('submit', function(e) {
  // データの送信をキャンセルする
  e.preventDefault();
  
  const url = form.action;
  
  // 入力された文字を取得する
  const body = canvas.value;
  
  // canvas に書き込まれた内容を
  // base64（文字列）にしてbase64という変数に入れておく
  const base64 = canvas.toDataURL('image/jpeg');
  
	axios.post(url, {
    body: body, // 送信するデータPHP側で$_POSST["body"]で受け取れる
    base64: base64 // 送信するデータPHP側で$_POSST["base64"]で受け取れる
  })
  .then(function (response) {
    // データの送信に成功したときの処理をここに書く
  })
  .catch(function (error) {
    // データの送信に失敗したときの処理をここに書く
  });
  
  console.log(`
  	${url} に以下のデータを送ります
    ${body}
    ${base64}
 	`);
  
});