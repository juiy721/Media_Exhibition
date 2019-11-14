

// 取得データをconsoleに表示させる

const form = document.querySelector('#first-line');

form.addEventListener('load', function(e) {

    // axios.get('/api/get_letter.php')
    // .then(function (response) {
    // // データの取得に成功したときの処理をここに書く
    //     console.log(response);
    // })
    // .catch(function (error) {
    // // データの取得に失敗したときの処理をここに書く
    //     console.log(error);
    // })
    axios.post('/api/get_letter.php')
            .then(function (response) {
            // データの送信に成功したときの処理をここに書く
                console.log(response);
                console.log(response.data[0].img);
            })
            .catch(function (error) {
            // データの送信に失敗したときの処理をここに書く
                console.log(error);
            });
});

console.log(axios);