// データを取得する

axios.get('/api/get_letter?offset=0')
.then(function (response) {
// データの送信に成功したときの処理をここに書く
    //iの?以降の文字を取得する
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
        // 日付を取得して表示
        const dateTime = new Date(response.data[0].posting_time);
        console.log(dateTime.toLocaleString());
    postingTime.innerHTML = `
    <p>${dateTime.toLocaleString()}</p>
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
        // 日付を取得して表示
        const future = new Date(response.data[0].posting_time);
        // 取得した日付の7日後を表示
        future.setDate(future.getDate() + 7);
        console.log(future.toLocaleString());
    
    Deadline.innerHTML = `
    <p>${future.toLocaleString()}</p>
    `;
}).catch(function (error) {
// データの送信に失敗したときの処理をここに書く
    console.log(error);
});
console.log(axios);