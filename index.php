<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>乘法表畫星星</title>
    <style>
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
</body>
</html>