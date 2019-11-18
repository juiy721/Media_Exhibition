// データを取得する

axios.get('/api/get_letter.php')
.then(function (response) {
// データの送信に成功したときの処理をここに書く
    console.log(response);
    console.log(response.data[0].img);
    var el = document.getElementById("test");
    el.innerHTML = `
    <div>
        <p>${response.data[0].img}</p>
        <img src=${response.data[0].img} />
    </div>
    `;
})
.catch(function (error) {
// データの送信に失敗したときの処理をここに書く
    console.log(error);
});
console.log(axios);