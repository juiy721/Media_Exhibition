// 送ったデータをconsoleに表示させる

const screenName = document.querySelector('#screen_name');
const ageInput = document.querySelector('#age');
const select = document.querySelector('#info-sex3');
const canvas = document.querySelector('#myCanvas');
const form = document.querySelector('#send-btn');



form.addEventListener('submit', function(e) {
  console.log('送信が試みられました');
  // データの送信をキャンセルする
  e.preventDefault();

  const name = screenName.value;
  const sex = select.value;
  const age = ageInput.value;

  console.log(name, sex, age);
  
  // const url = form.action;
  
  // // 入力された文字を取得する
  // const body = canvas.value;
  
  // canvas に書き込まれた内容を
  // base64（文字列）にしてbase64という変数に入れておく
  const base64 = canvas.toDataURL('image/jpeg');
  console.log(base64);
  
	// axios.post(url, {
  //   body: body, // 送信するデータPHP側で$_POSST["body"]で受け取れる
  //   base64: base64 // 送信するデータPHP側で$_POSST["base64"]で受け取れる
  // })
  // .then(function (response) {
  //   // データの送信に成功したときの処理をここに書く
  // })
  // .catch(function (error) {
  //   // データの送信に失敗したときの処理をここに書く
  // });
  
  // console.log(`
  // 	${url} に以下のデータを送ります
  //   ${body}
  //   ${base64}
  //  `);
   
  console.log(axios);
  
});