<?php
require_once ('.../admin/checkAdmin.php');
require_once ('../db.inc.php');
require_once ('./title.php');

$sqlTotal = "SELECT count(1) AS `count` FROM `members`";
$stmtTotal = $pdo->query($sqlTotal);
$arrTotal = $stmtTotal->fetchAll()[0];
$total = $arrTotal['count'];

$numPerPage = 5;
$totalPages = ceil($total/$numPerPage);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = $page < 1 ? 1 : $page;

?>
<head>
    <style>
    .w200px {
        width: 180px;
    }
    .mForm {
        width:90%;
        margin: 0 auto;
    }

    th {
        min-height:50px;
        min-width:50px;
    }
    </style>
</head>

<body>
<div class="">
    <h3 class="mt-5 mb-3 text-center">會員一覽</h3>
    <form class="mForm" name="mForm" method="POST" action="">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr class=" text-center">
                    <th class="border">編號</th>
                    <th class="border">帳號</th>
                    <th class="border">姓名</th>
                    <th class="border">暱稱</th>
                    <th class="border">大頭貼</th>
                    <th class="border">性別</th>
                    <th class="border">Email</th>
                    <th class="border">手機號碼</th>
                    <th class="border">生日</th>
                    <th class="border">住址</th>
                    <th class="border">功能</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT `memberId`, `memberAccount`, `memberName`, `memberNickname`, `memberGender`, `memberEmail`, `memberPhone`, `memberImg`, `memberBirthday`, `memberAddress` 
                        FROM `members`
                        ORDER BY `memberId` ASC
                        LIMIT ?, ?";
                
                $arrParam = [
                    ($page - 1) * $numPerPage, 
                    $numPerPage
                ];

                $stmt = $pdo->prepare($sql);
                $stmt->execute($arrParam);

                if($stmt->rowCount() > 0) {
                    $arr = $stmt->fetchAll();
                    for($i = 0; $i < count($arr); $i++) {
                    ?>

            <tr class=" text-center">    
                <td class="border"><?php echo $arr[$i]['memberId'] ?></td>
                <td class="border"><?php echo $arr[$i]['memberAccount'] ?></td>
                <td class="border"><?php echo $arr[$i]['memberName'] ?></td>
                <td class="border"><?php echo $arr[$i]['memberNickname'] ?></td>
                <td class="border p-0">
                <?php if($arr[$i]['memberImg'] !== NULL) { ?>
                    <img class="w200px" src="../images/<?php echo $arr[$i]['memberImg'] ?>">
                <?php } ?>
                </td>
                <td class="border"><?php echo $arr[$i]['memberGender'] ?></td>
                <td class="border"><?php echo $arr[$i]['memberEmail'] ?></td>
                <td class="border"><?php echo $arr[$i]['memberPhone'] ?></td>
                <td class="border"><?php echo $arr[$i]['memberBirthday'] ?></td>
                <td class="border"><?php echo $arr[$i]['memberAddress'] ?></td>
                <td class="border">
                    <a class="btn btn-primary" href="./edit.php?id=<?php echo $arr[$i]['memberId']; ?>">編輯</a>
                    <a class="btn btn-danger" href="./delete.php?id=<?php echo $arr[$i]['memberId']; ?>">刪除</a>
                </td>
            </tr>
                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td class="border" colspan="10">沒有資料</td>
                    </tr>
                <?php
                }
                ?>
                
            </tbody>
            <tfoot>
            <tr>
                <td class="text-center" colspan="11">
                <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                    <a class="btn btn-primary my-3 mx-1" href="?page=<?php echo $i ?>"><?php echo $i ?></a>
                <?php } ?>
                </td>
            </tr>
        </tfoot>

        </table>

    </form>
    </div>
</body>

<?php
require_once('../html-footer.php');//html-footer模板(BS設定)
?>