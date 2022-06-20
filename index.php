<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>乘法表畫星星</title>
    <style>
        body{
            font-family: 'Courier New', Courier, monospace;
            background-color: #eee;
        }
        h1{
            font-family: '標楷體';
            text-align: center;
        }
        #ninenine{
            background-color: lightblue;
            font-family: '標楷體';
            padding: 0 0 5px 5px;
            border: 10px outset rgb(183, 226, 240);
            box-shadow: 2px 2px 5px black;
        }
        #print{
            background-color: lightpink;
            font-family: '標楷體';
            padding: 0 0 5px 5px;
            border: 10px outset pink;
            box-shadow: 2px 2px 5px black;
        }
        .title1{
            font-size: 30px;
        }
        .title2{
            font-size: 30px;
        }
        #num1{
            font-size: 20px;
        }
        #num2{
            font-size: 20px;
        }
        #line{
            font-size: 20px;
        }
        label{
            font-size: 20px;
        }
        #shape{
            font-size: 20px;
        }
        button{
            font-size: 20px;
        }
        button:hover{
            color: white;
            background-color: black;
        }
        table{
            font-family: 'Times New Roman', Times, serif;
            margin: 5px auto;
            border: 2px solid black;
            text-align: center;
            width: 99vw;
            font-size: larger;
            overflow: scroll;
            box-shadow: 2px 2px 5px black;
        }
        tr td{
            border: 1px solid darkslateblue;
            padding: 2px;
            min-width: 200px;
            overflow:auto;
        }
        td:hover{
            background-color: lightgreen;
        }
        tr:nth-child(odd){
            background-color: lightcyan;
        }
        tr:nth-child(even){
            background-color: lightgoldenrodyellow;
        }
        .red{
            color: red;
        }
        .blue{
            color: blue;
        }
        div{
            display: block;
            text-align: left;
            margin: 10px auto;
            width: 99vw;
            height: 50%;
        }
        span{
            font-size: 1.5rem;
            font-weight: bolder;
        }
        .colora{
            color:cadetblue;
            /* text-shadow: 1px 1px 1px black; */
        }
        .colorb{
            color:darkgoldenrod;
            text-shadow: 1px 1px 1px black;
        }
        .colora:hover{
            color: black;
        }
        .colorb:hover{
            color: black;
        }
    </style>
</head>
<body>
    <h1>乘法表及畫星星(用post和function方式)</h1>
    <form action="index.php" method="post" id="ninenine">
        <p class="title1">「99」乘法表</p>
        <label for="num1">數字1:
            <input type="number" name="num1" min="1" max="99" id="num1" value="<?=isset($_POST['num1'])?$_POST['num1']:"";?>">
        </label>
        <label for="num2">數字2:
            <input type="number" name="num2" min="1" max="99" id="num2" value="<?=isset($_POST['num2'])?$_POST['num2']:"";?>">
        </label>
        <button type="submit">輸出乘法表</button>
    </form>
    <?php
        $num1 = isset($_POST['num1'])?$_POST['num1']:"";
        $num2 = isset($_POST['num2'])?$_POST['num2']:"";
        ninenine($num1,$num2);
        function ninenine($num1,$num2){
            echo "<table>";
            for($i=1;$i<=$num1;$i++){
                echo "<tr>";
                for($j=1;$j<=$num2;$j++){
                    $k = $i * $j;
                    $string1 = strval($j);
                    $string2 = strval($i);
                    $stringpad1 = str_pad($string1,2,"0",STR_PAD_LEFT);
                    $stringpad2 = str_pad($string2,2,"0",STR_PAD_LEFT);
                    $string3 = strval($k);
                    $stringpad3 = str_pad($string3,4,"0",STR_PAD_LEFT);
                    $col = (($j%2==1 && $i%2==1) || ($j%2==0 && $i%2==0))?"red":"blue";
                    echo "<td class=${col}>".$stringpad1." x ".$stringpad2." = ".$stringpad3."</td>";   
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
    <?php
    $line = isset($_POST['line'])?$_POST['line']:"";
    $shape = isset($_POST['shape'])?$_POST['shape']:"";
    ?>
    <form action="index.php" method="post" id="print">
    <p class="title2">畫星星</p>
        <label for="line">行數:
            <input type="number" name="line" min="3" max="101" id="line" value="<?=isset($_POST['line'])?$_POST['line']:"";?>">
        </label>
        <label for="shape">選擇形狀:
            <select name="shape" id="shape">
                <option value="直角三角形" <?=($shape=='直角三角形')?'selected':'';?>>直角三角形</option>
                <option value="倒直角三角形" <?=($shape=='倒直角三角形')?'selected':'';?>>倒直角三角形</option>
                <option value="正三角形" <?=($shape=='正三角形')?'selected':'';?>>正三角形</option>
                <option value="倒正三角形" <?=($shape=='倒正三角形')?'selected':'';?>>倒正三角形</option>
                <option value="菱形" <?=($shape=='菱形')?'selected':'';?>>菱形</option>
                <option value="矩形" <?=($shape=='矩形')?'selected':'';?>>矩形</option>
                <option value="矩形挖空" <?=($shape=='矩形挖空')?'selected':'';?>>矩形挖空</option>
                <option value="矩形+對角線" <?=($shape=='矩形+對角線')?'selected':'';?>>矩形+對角線</option>
            </select>
        </label>
        <button type="submit">輸出圖形</button>
    </form>
    <div>
    <?php
        printstars($line,$shape);
        function printstars($line,$shape){
            switch ($shape) {
                case '直角三角形':
                    for($i=0;$i<$line;$i++){
                        $color = ($i%2==1)?'colora':'colorb';
                        for($j=0;$j<=$i;$j++){
                            echo "<span class=$color>"."*"."</span>";
                        }
                        echo "<br>";
                    }
                    break;
                case '倒直角三角形':
                    for($i=0;$i<$line;$i++){
                        $color = ($i%2==1)?'colora':'colorb';
                        for($j=$line;$j>$i;$j--){
                            echo "<span class=$color>"."*"."</span>";
                        }
                        echo "<br>";
                    }
                    break;
                case '正三角形':
                    for($i=0;$i<$line;$i++){
                        $color = ($i%2==1)?'colora':'colorb';
                        for($j=($line-1);$j>$i;$j--){
                            echo "<span>&nbsp</span>";
                        }
                        for($k=1;$k<=(2*$i)+1;$k++){
                            echo "<span class=$color>"."*"."</span>";
                        }
                        echo "<br>";
                    }
                    break;
                case '倒正三角形':
                    for($i=0;$i<$line;$i++){
                        $color = ($i%2==1)?'colora':'colorb';
                        for($j=0;$j<=$i;$j++){
                            echo "<span>&nbsp</span>";
                        }
                        for($k=($line*2)-1;$k>$i*2;$k--){
                            echo "<span class=$color>"."*"."</span>";
                        }
                        echo "<br>";
                    }
                    break;
                case '菱形':
                    for($i=0;$i<$line;$i++){
                        $color = ($i%2==1)?'colora':'colorb';
                        for($j=($line-1);$j>$i;$j--){
                            echo "<span>&nbsp</span>";
                        }
                        for($k=1;$k<=(2*$i)+1;$k++){
                            echo "<span class=$color>"."*"."</span>";
                        }
                        echo "<br>";
                    }
                    for($i=0;$i<$line;$i++){
                        $color = ($i%2==0)?'colora':'colorb';
                        for($j=0;$j<=$i;$j++){
                            echo "<span>&nbsp</span>";
                        }
                        for($k=(($line-1)*2)-1;$k>$i*2;$k--){
                            echo "<span class=$color>"."*"."</span>";
                        }
                        echo "<br>";
                    }
                    break;
                case '矩形':
                    for($i=0;$i<$line;$i++){
                        $color = ($i%2==1)?'colora':'colorb';
                        for($j=0;$j<$line;$j++){
                            echo "<span class=$color>"."*"."</span>"."&nbsp";//多加空格看起來比較方正
                        }
                        echo "<br>";
                    }
                    break;
                case '矩形挖空':
                    for($i=0;$i<$line;$i++){
                        $color = ($i%2==1)?'colora':'colorb';
                        for($j=0;$j<$line;$j++){
                            if($i==0 || $i==($line-1) ||$j==0 ||$j==($line-1)){
                                echo "<span class=$color>"."*"."</span>"."<span>&nbsp</span>";
                            }else{
                                echo "<span>&nbsp</span>"."<span>&nbsp</span>";
                            }
                        }
                        echo "<br>";
                    }
                    break;
                case '矩形+對角線':
                    for($i=0;$i<$line;$i++){
                        $color = ($i%2==1)?'colora':'colorb';
                        for($j=0;$j<$line;$j++){
                            if($i==0 || $i==($line-1) ||$j==0 ||$j==($line-1) ||$i==$j ||$j==(($line-1))-$i){
                                echo "<span class=$color>"."*"."</span>"."<span>&nbsp</span>";
                            }else{
                                echo "<span>&nbsp</span>"."<span>&nbsp</span>";
                            }
                        }
                        echo "<br>";
                    }
                    break;
            }
        }
    ?>
    </div>
</body>
</html>