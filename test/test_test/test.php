<h1>みどりの書簡</h1>
<form id="info-container"
          name="info-container"
          method="post" 
          action="test_do.php">
    <dl>
        <dt>
            <label for="screen_name">名前</label>
        </dt>
        <dd>
            <input 
            type="text" 
            name="screen_name" 
            size="30" 
            maxlength="10"
            id="screen_name" />
        </dd>

        <dt>
            <label for="sex">性別</label>
        </dt>
        <dd>
            <select name="sex">
                <option value="male">男性</option>
                <option value="female">女性</option>
                <option value="other">その他</option>
            </select>
        </dd>

        <dt>
        <label for="age">年齢</label>
        </dt>
        <dd>
            <input 
            type="number" 
            name="age"
            min="10"
            max="100"
            step="1"
            id="age" />
        </dd>
    </dl>

    <input type="submit" value="送る" />
</form>