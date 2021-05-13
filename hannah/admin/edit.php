<?php
require_once ('./checkAdmin.php');
require_once ('../db.inc.php');
require_once ('../templates/admin-nav.php');
?>

<head>
    <meta charset="UTF-8">
    <style>
    .w200px {
        width: 200px;
    }
    .form {
        margin: 0 auto;
    }
    </style>
</head>

<body>
<div>
</div>
<h3 class="mt-5 mb-5 text-center">修改會員資料</h3>
<form class="form mb-5" name="mForm" method="POST" action="updateEdit.php" enctype="multipart/form-data">
        <?php
        $sql = "SELECT `memberId`, `memberAccount`, `memberName`, `memberNickname`, `memberGender`, `memberEmail`, `memberPhone`, `memberImg`, `memberBirthday`, `memberAddress` 
                FROM `members` 
                WHERE `memberId` = ?";

        $arrParam = [
            (int)$_GET['id']
        ];

        $stmt = $pdo->prepare($sql);
        $stmt->execute($arrParam);
        
        if($stmt->rowCount() > 0) {
            $arr = $stmt->fetchAll()[0];
        ?>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">會員帳號</label>
            <div class="col-sm-9">
                <input class="form-control" type="text" name="memberAccount" value="<?php echo $arr['memberAccount']; ?>" maxlength="50" />
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">會員姓名</label>
            <div class="col-sm-9">
                <input class="form-control" type="text" name="memberName" value="<?php echo $arr['memberName'] ?>" maxlength="50" />
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">會員暱稱</label>
            <div class="col-sm-9">
                <input class="form-control" type="text" name="memberNickname" value="<?php echo $arr['memberNickname'] ?>" maxlength="50" />
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">會員大頭貼</label>
            <div class="col-sm-9">
                <?php if($arr['memberImg'] !== NULL) { ?>
                    <img class="w200px" src="../images/<?php echo $arr['memberImg'] ?>" />
                <?php } ?>
                <input class="btn" type="file" name="memberImg" />
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">會員性別</label>
            <div class="col-sm-9">
                <select name="memberGender">
                    <option class="form-control" value="<?php echo $arr['memberGender'] ?>" selected><?php echo $arr['memberGender'] ?></option>
                    <option value="男">男</option>
                    <option value="女">女</option>
                </select>
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">會員Email</label>
            <div class="col-sm-9">
                <input class="form-control" type="text" name="memberEmail" value="<?php echo $arr['memberEmail'] ?>" maxlength="100" />
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">會員手機號碼</label>
            <div class="col-sm-9">
                <input class="form-control" type="text" name="memberPhone" value="<?php echo $arr['memberPhone'] ?>" maxlength="10" />
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">會員生日</label>
            <div class="col-sm-9">
            <input class="form-control" type="text" name="memberBirthday" value="<?php echo $arr['memberBirthday'] ?>" maxlength="10" />
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">會員住址</label>
            <div class="col-sm-9">
            <textarea class="form-control" name="memberAddress"><?php echo $arr['memberAddress'] ?></textarea>
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">刪除</label>
            <div class="col-sm-9">
                <a class="text-danger" href="./delete.php?id=<?php echo $arr['memberId'] ?>">刪除此會員資料</a>
            </div>
        </div>
        <hr>

        <?php
        } else {
            ?>
            
            <h4 class="text-center text-danger">沒有會員資料</h4>
            
        <?php
        }
        ?>

        <div class="text-center mb-5" colspan="10">
            <button type="submit" class="btn btn-primary shadow-sm mx-3 my-3">修改資料</button>
            <a class=" text-decoration-none" href="./admin.php">回會員一覽</a>
            <!-- <input type="submit" name="smb" value="修改">修改資料 -->
        </div>

    <input type="hidden" name="id" value="<?php echo (int)$_GET['id'] ?>">
</form>
</body>
</html>