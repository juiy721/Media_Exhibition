
 init(){
  //リストオブジェクトを作成。表示リストのルートになります。
  var stage =  new  createjs.Stage（" myCanvas "）;
  //テキストを作成します
  var t =  new  createjs.Text（" Hello World！", " 24px serif "," DarkRed ");
  stage.addChild(t);
  t.ｘ = 100.
  t.ｙ = 100.
  // Stageの描画を更新
  stage.update();
}