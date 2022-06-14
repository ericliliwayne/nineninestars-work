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
        }
        table{
            margin: 5px auto;
            border: 2px solid black;
            text-align: center;
            font-size: larger;
        }
        tr td{
            border: 1px solid darkslateblue;
            padding: 2px;
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
    </style>
</head>
<body>
    <form action="index.php" method="post">
        <label for="num1">數字1:
            <input type="number" name="num1" min="1" max="15" id="num1">
        </label>
        <label for="num2">數字2:
            <input type="number" name="num2" min="1" max="15" id="num2">
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
                    $stringpad3 = str_pad($string3,3,"0",STR_PAD_LEFT);
                    $col = (($j%2==1 && $i%2==1) || ($j%2==0 && $i%2==0))?"red":"blue";
                    echo "<td class=${col}>".$stringpad1." x ".$stringpad2." = ".$stringpad3."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
    <form action="index.php" method="post">
        <label for="line">行數:
            <input type="number" name="line" min="3" max="100" id="line">
        </label>
        <label for="shape">選擇形狀:
            <select name="shape" id="shape">
                <option value="直角三角形">直角三角形</option>
                <option value="倒直角三角形">倒直角三角形</option>
                <option value="正三角形">正三角形</option>
                <option value="倒正三角形">倒正三角形</option>
                <option value="菱形">菱形</option>
                <option value="矩形">矩形</option>
            </select>
        </label>
        <button type="submit">輸出圖形</button>
    </form>
    <?php
        $line = isset($_POST['line'])?$_POST['line']:"";
        $shape = isset($_POST['shape'])?$_POST['shape']:"";
        printstars($line,$shape);
        function printstars($line,$shape){
            switch ($shape) {
                case '直角三角形':
                    for($i=0;$i<$line;$i++){
                        for($j=0;$j<=$i;$j++){
                            echo "*";
                        }
                        echo "<br>";
                    }
                    break;
                case '倒直角三角形':
                    for($i=0;$i<$line;$i++){
                        for($j=$line;$j>$i;$j--){
                            echo "*";
                        }
                        echo "<br>";
                    }
                    break;
                case '正三角形':
                    for($i=0;$i<$line;$i++){
                        for($j=($line-1);$j>$i;$j--){
                            echo "&nbsp";
                        }
                        for($k=1;$k<=(2*$i)+1;$k++){
                            echo "*";
                        }
                        echo "<br>";
                    }
                    break;
                case '倒正三角形':
                    for($i=0;$i<$line;$i++){
                        for($j=0;$j<=$i;$j++){
                            echo "&nbsp";
                        }
                        for($k=($line*2)-1;$k>$i*2;$k--){
                            echo "*";
                        }
                        echo "<br>";
                    }
                    break;
                case '菱形':
                    for($i=0;$i<$line;$i++){
                        for($j=($line-1);$j>$i;$j--){
                            echo "&nbsp";
                        }
                        for($k=1;$k<=(2*$i)+1;$k++){
                            echo "*";
                        }
                        echo "<br>";
                    }
                    for($i=0;$i<$line;$i++){
                        for($j=0;$j<=$i;$j++){
                            echo "&nbsp";
                        }
                        for($k=(($line-1)*2)-1;$k>$i*2;$k--){
                            echo "*";
                        }
                        echo "<br>";
                    }
                    break;
                case '矩形':
                    for($i=0;$i<$line;$i++){
                        for($j=$line;$j<=$i;$j*1){
                            echo "*";
                        }
                        echo "<br>";
                    }
                    break;
            }
        }
    ?>
</body>
</html>