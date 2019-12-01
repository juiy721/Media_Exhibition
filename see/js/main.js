// データを取得する
// function url(){
var url = location.search.substring(1);
console.log(url);
axios.get('/api/get_letter?screen_id=' + url + '')
.then(function (response) {
// データの送信に成功したときの処理をここに書く
    console.log(response);
    console.log(response.data[0].screen_name);
    console.log(response.data[0].sex);
    console.log(response.data[0].age);
    console.log(response.data[0].posting_time);
    console.log(response.data[0].img);
    // screen_name
    var Name = document.getElementById("screen_name");
    Name.innerHTML = `
    <p>${response.data[0].screen_name}</p>
    `;
    // sex
    var Sex = document.getElementById("sex");
    Sex.innerHTML = `
    <p class="space2">${response.data[0].sex}</p>
    `;
    // age
    var Age = document.getElementById("age");
    Age.innerHTML = `
    <p>${response.data[0].age}</p>
    `;
    // posting_time
    var postingTime = document.getElementById("posting_time");
    // 日付を取得する
    const dateTime = luxon.DateTime.fromFormat(response.data[0].posting_time, 'yyyy-MM-dd hh:mm:ss');
    console.log(dateTime.toFormat('yyyy年MM月dd日 H時mm分'));
    postingTime.innerHTML = `
    <p>${dateTime.toFormat('yyyy年MM月dd日 H時mm分')}</p>
    `;
    // img
    var Img = document.getElementById("img");
    Img.innerHTML = `
    <div>
        <div class="cut">
            <img src="/../api/post_letter/images/${response.data[0].img}.jpeg" 
                 class="line"/>
        </div>
    </div>
    `;
    // print_id
    var Img = document.getElementById("print_id");
    Img.innerHTML = `
        ${response.data[0].print_id}
    `;
    // deadline
    var Deadline = document.getElementById("deadline");

        // 7日後の時刻を作る
        const deadline = dateTime.plus({ days: 7 });
        // 7日後の日付をフォーマットしてコンソールに表示する
        console.log(deadline.toFormat('yyyy年MM月dd日 23時29分'));
    
    Deadline.innerHTML = `
    <p>${deadline.toFormat('yyyy年MM月dd日 23時29分')}</p>
    `;
}).catch(function (error) {
// データの送信に失敗したときの処理をここに書く
    console.log(error);
});
console.log(axios);
// }