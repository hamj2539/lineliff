<?php

include "header.php";
include "conn.php";
$sql = "SELECT * FROM user";
$result = mysqli_query($conn,$sql);
?>

<h3>เพิ่มข้อมูลผู้ใช้<h3>

<h3>ข้อมูลผู้ใช้</h3>
<table border = "1">
    <tr>
        <th>ชื่อ</th>
        <th>นามสกุล</th>
        <th>Username</th>
        <th>Password</th>
        <th>Email</th>
        <th>เบอร์โทร</th>
        <th>กลุ่มผู้ใช้</th>
        <th>เข้าระบบล่าสุด</th>
        <th>เพิ่มเติม</th>
    </tr>
    <?php while($rs = mysqli_fetch_array($result)) { ?>
    <tr>
        <td><?php echo $rs['firstname']?></td>
        <td><?php echo $rs['lastname']?></td>
        <td><?php echo $rs['username']?></td>
        <td><?php echo $rs['password']?></td>
        <td><?php echo $rs['email']?></td>
        <td><?php echo $rs['tel']?></td>
        <td><?php echo $rs['user_type']?></td>
        <td><?php echo $rs['last_login']?></td>
        <td>แก้ไข ลบ </td>
    </tr>
    <?php } ?>
<?php
include "footer.php"
?>