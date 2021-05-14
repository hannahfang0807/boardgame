<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, thead, tr, th, td, tbody {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    
<?php
  require_once('../db.inc.php');

// print_r( $_POST['chk']);

$sql = "SELECT * FROM `reservations` 
WHERE reservationId = ? ";
$arrParam = (int)$_GET['reservationId'];
$stmt = $pdo->prepare($sql);
$stmt->execute([$arrParam]);

if($stmt->rowCount() > 0) {
    $result = $stmt->fetchAll()[0];
    ?>

<form action="./update.php" method="POST">

<table>
<thead>
    <tr>
      <th>預約日期</th>
      <th>預約編號</th>
      <th>會員編號</th>
      <th>預約時間</th>
      <th>預約時數</th>
      <th>預約地點</th>
      <th>預約人數</th>
      <th>客人備註</th>

    </tr>
    <tr>
        <td><input type="date" name="date" value="<?php echo $result['date'];?>"> </td>
        <td><?php echo $result['reservationId'];?></td>
        <td><?php echo $result['memberId'];?></td>
        <td> 
            <select name="startTime">
                <option value="<?php echo $result['startTime'];?>"><?php echo $result['startTime'];?>: 00</option>
                <option value="13">13: 00</option>
                <option value="14">14: 00</option>
                <option value="15">15: 00</option>
                <option value="16">16: 00</option>
                <option value="17">17: 00</option>
                <option value="18">18: 00</option>
                <option value="19">19: 00</option>
                <option value="20">20: 00</option>
                <option value="21">21: 00</option>
                <option value="22">22: 00</option>
            </select>
        </td>
        <td>
            <select name="duration" id="hours">
                <option value="<?php echo $result['duration'];?>"><?php echo $result['duration'];?></option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
            
    
        </td>
        <td>
            <select name="storeId" id="branch">
            <?php (int)$result['storeId']=== 1?  $opt = '<option value="1">台北店</option>' : $opt ='<option value="2">台中店</option>' ?>
                <?php echo $opt ?>
                <option value="1">台北店</option>
                <option value="2">台中店</option>
            </select>
    
        </td>
        <td>
            <select name="numberOfPeople" id="poeple">
                <option value="<?php echo $result['numberOfPeople'];?>"><?php echo $result['numberOfPeople'];?></option>
                <option value="3">4</option>
                <option value="4">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
        </td>
        <td>
            <textarea name="notes" cols="10" rows="1"><?php echo $result['notes'];?></textarea>
        </td>
    </tr>

    <?php }?>
  </thead>

</table>
<input type="hidden" name="reservationId" value="<?php echo (int)$_GET['reservationId'] ?>">

<button>確認修改</button>
</form>
<a href="./reservations.php">回上頁</a>
</body>
</html>
