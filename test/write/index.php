<!DOCTYPE html >
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="ress.min.css">
  <link rel="stylesheet" type="text/css" href="index.css">
  <!-- <script src="https://code.createjs.com/1.0.0/createjs.min.js"></script> -->
  <link href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho&display=swap" rel="stylesheet">
  <!-- <script type="text/javascript" src="index.js"></script> -->
  <title>みどりの書簡</title>
</head>
<body>
  <div class="header">
      
    <!-- みどりの書簡のロゴ -->
    <h1 class="header-Heading">
        <a href="./../../index.html">
          <img src="img/header/logo.png" class="midori">
        </a>
    </h1>

    <!-- ヘッダーのリンク -->
    <div class = "top-icon-inputs">
        <a href="./../index.html">
          <img src="img/header/how-to.png" class="top-icon">
        </a>
        <a>
          <img src="img/header/write.png" class="top-icon">
        </a>
        <a href="choose/index.html">
          <img src="img/header/choose.png" class="top-icon">
        </a>
    </div>

  </div>

  <div class="inputs">
    <div class="inputs-inner">
      <!-- 大きい手紙の画像 -->
      <img src="img/tegami.png" class="tegami">
      
      <!-- 情報入力コンテナー -->
      <div class="info-Container">
        <form class="info-container-from"
              id="info-container"
              name="info-container"
              method="post" 
              action="write_do.php">
          <div class="info-box">
            <p class="info-name">
              <label class="info-name2"
                     for="screen_name">
                名前
              </label>
              <input 
                class="info-name3"
                type="text" 
                name="screen_name" 
                id="screen_name"
                size="30" 
                maxlength="10" /> 
            </p>

            <div class="info-field">
                <p class="info-sex">
                  <label class="info-sex2"
                         for="sex">
                    性別
                  </label>
                  <select name="sex" class="info-sex3">
                    <option value="male">男性</option>
                    <option value="female">女性</option>
                    <option value="other">その他</option>
                  </select>
                </p>

              <p class="info-nenrei">
                <label class="info-nenrei-label"
                       for="age">
                  年齢
                </label>
                <input 
                  class="info-nenrei2"
                  type="number" 
                  name="age"
                  id="age"
                  min="10"
                  max="100"
                  step="1" />
              </p>
            </div>
          </div>
        </form>
      </div>
    </div class="inputs-inner">
  </div>


  <p class="tyuui">※手紙を選ぶ人には
    <a class="bold">一行目のみ</a>
    表示されます
  </p>

  <section>
    <div class="center-line">
      <div class="write-icons">

        <img src="img/enpitu.png" 
             class="write-icon enpitu" 
             alt="鉛筆のアイコン"
             id="enpitu-btn"> 

        <img src="img/kesigomu.png" 
             class="write-icon kesigomu" 
             alt="消しゴムのアイコン"
             id="kesigomu-btn">

        <img src="img/modoru.png" 
             class="write-icon modoru" 
             alt="戻る"
             id="modoru-btn">

        <img src="img/susumu.png" 
             class="write-icon susumu" 
             alt="進む"
             id="susumu-btn">
        <!-- altは名前が出る -->
      </div>
      <!-- 便箋のキャンバスの大きさ -->
      <canvas 
        id="myCanvas" 
        width="565" 
        height="600" 
        class="canvas"
      >
      </canvas>
    </div>

    <!-- 送るのボタン -->
    <a href="#">
      <img src="img/send.png" 
           class="send"
           id="send-btn">
    </a>
  </section>

</body>
</html>