<?php
    require_once 'table.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
<!--  <script-->
<!--    src="https://code.jquery.com/jquery-3.4.1.min.js"-->
<!--    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="-->
<!--    crossorigin="anonymous"></script>-->
<!--  <script src="script.js"></script>-->
	<title>Document</title>
</head>
<body>
    <form method="post">
        <?php
            $tables = array(1);
            if(isset($_POST['addRow'])){
                $tables = unserialize($_POST['myArr']);
                $val = $_POST['addRow'];
                $tables[$val] += 1;
            }elseif (isset($_POST['addTable'])){
                $tables = unserialize($_POST['myArr']);
                $tables[] = 1;
            }elseif (isset($_POST['vali'])) {
              $tables = unserialize($_POST['myArr']);
            }
        ?>
        <input type="hidden" name="myArr" value="<?= htmlentities(serialize($tables)); ?>">

        <?php
            $html = new Table($tables);

        ?>

        <button type="submit" name="addTable" value="1">Add table</button>
        <button type="submit" name="vali" value="1">submit</button>
      <textarea  name="valid" rows="1"  ><?= $html->validtable() ;?></textarea>
    </form>
    <?php
//    print_r($html->input($html->$this->year() - $tabRow[$i] + $j + 1));
//      echo '<pre>';
//  var_dump($_POST);
//    echo '</pre>';
    ?>
</body>
</html>