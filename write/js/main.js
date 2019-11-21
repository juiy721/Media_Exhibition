// 鉛筆の描画

var penColor = "Black" ;

window.addEventListener("load", init); 

    function init() {
        // Stageオブジェクトを作成。表示リストのルートになります。
        var stage = new createjs.Stage("myCanvas");

        var bmp = new createjs.Bitmap("img/binsen.png");
        bmp.scaleX = 0.22; // 画像の幅
        bmp.scaleY = 0.22; // 画像の高さ
        stage.addChild(bmp);

        // Stageオブジェクトを作成。表示リストのルートになります。
        var stage = new createjs.Stage("myCanvas");

        var bmp = new createjs.Bitmap("img/binsen.png");
        bmp.scaleX = 0.22; // 画像の幅
        bmp.scaleY = 0.22; // 画像の高さ
        stage.addChild(bmp);

        // タッチイベントが有効なブラウザの場合、
        // CreateJSでタッチイベントを扱えるようにする
        if (createjs.Touch.isSupported()) {
        createjs.Touch.enable(stage);
        }

        var shape = new createjs.Shape(); // シェイプを作成
        stage.addChild(shape); // ステージに配置
        // ステージ上でマウスボタンを押した時のイベント設定
        stage.addEventListener("stagemousedown", handleDown);

        // マウスを押した時に実行される
        function handleDown(event) {
        // 線の描画を開始
        shape.graphics.beginStroke(penColor) // 黒色で、描画を開始
        shape.graphics.moveTo(event.stageX, event.stageY) // 描画開始位置を指定
        // ステージ上でマウスを動かした時と離した時のイベント設定
        stage.addEventListener("stagemousemove", handleMove);
        stage.addEventListener("stagemouseup", handleUp);
        }


        // マウスが動いた時に実行する
        function handleMove(event) {
        // マウス座標への線を引く
        shape.graphics.lineTo(event.stageX, event.stageY);
        }


        // マウスボタンが離された時に実行される
        function handleUp(event) {
        // マウス座標への線を引く
        shape.graphics.lineTo(event.stageX, event.stageY);
        // 線の描画を終了する
        shape.graphics.endStroke();
        // イベント解除
        stage.removeEventListener("stagemousemove", handleMove);
        stage.removeEventListener("stagemouseup", handleUp);
        }
        createjs.Ticker.timingMode = createjs.Ticker.RAF;
        createjs.Ticker.addEventListener("tick", onTick);
        function onTick() {
        stage.update(); // Stageの描画を更新
        }
        

        var enpituBtn = document.getElementById('enpitu-btn');
        enpituBtn.addEventListener('click', function() {
            penColor = "Black";
            shape.graphics.setStrokeStyle(1);
            console.log('鉛筆のボタンです');
          
        }, false);

        var kesigomuBtn = document.getElementById('kesigomu-btn');
        kesigomuBtn.addEventListener('click', function() {
            penColor = "White";
            shape.graphics.setStrokeStyle(15);
            console.log('消しゴムのボタンです');
          
        }, false);

        
        var sendBtn = document.getElementById('send-btn');
        sendBtn.addEventListener('click', function() {
  
            console.log('送るのボタンです');
            // alert('JavaScriptのアラート');
            if( confirm("手紙を送りますか？") ) {
                alert("手紙を送りました。");
                window.location.href = '/../choose';
            }
            else {
                alert("手紙を送りませんでした。");
            }
          
        }, false);
        
    }
// 鉛筆の描画終了