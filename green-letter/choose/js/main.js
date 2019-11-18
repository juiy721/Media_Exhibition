// データを取得する

axios.get('/api/get_letter.php')
.then(function (response) {
// データの送信に成功したときの処理をここに書く
    console.log(response);
    // console.log(response.data[i].img);
    var el = document.getElementById("test");
    let html = '';
    for (var i = 0; i < response.data.length; i++) {
        console.log(response.data[i]);
        html += `
        <a href="../see?id=1/">
        <div class="cut">
            <img src="/../../api/${response.data[i].img}.jpeg"
                 class="first-line" />
        </div>
        <img src="img/empty-frame.png"
              class="green-frame"
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