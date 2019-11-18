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

  // console.log(name, sex, age);
  
  const url = form.action;
  
  // // 入力された文字を取得する
  console.log(canvas);

    // 空のimg要素を作る
    const img = new Image();
    img.onload = function() {
    // img要素の読み込みが終わったらこの中が処理される
    // 画像をHTMLに追加する
    // document.body.appendChild(img);
    };
    // img要素 srcに画像化（base64化）したcanvasの内容を反映する
    img.src = canvas.toDataURL('image/jpeg');
    console.log(img.src);

 
  // canvas に書き込まれた内容を
  // base64（文字列）にしてbase64という変数に入れておく
  const base64 = canvas.toDataURL('image/jpeg');
  // console.log(base64);

  const params = new URLSearchParams();
  params.append('screen_name', name); 
  params.append('sex', sex); 
  params.append('age', age); 
  params.append('base64', base64);

  axios.post('/api/write_do.php', params)
  .then(function (response) {
  // データの送信に成功したときの処理をここに書く
      console.log(response);
      window.location.href = '/../choose'
  })
  .catch(function (error) {
  // データの送信に失敗したときの処理をここに書く
      console.log(error);
  })
  // console.log(`
  // 	${url} に以下のデータを送ります
  //   ${body}
  //   ${base64}
  //  `);

  // window.location.href = '../../how-to/index.html';
});