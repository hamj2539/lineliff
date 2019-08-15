<?php

include 'header.php';
include 'conn.php';

$firstname = null;
$lastname = null;
$username = null;
$password = null;
$tel = null;
$email = null;
$user_type = null;
if(isset($_GET['eid'])){
    $id = $_GET['eid'];

    $sqle = "SELECT * FROM user WHERE id = '".$id."'";
    $result = mysqli_query($conn,$sqle);
    $rse = mysqli_fetch_array($result);

    $firstname = $rse['firstname'];
    $lastname = $rse['lastname'];
    $username = $rse['username'];
    $password = $rse['password'];
    $tel = $rse['tel'];
    $email = $rse['email'];
    $user_type = $rse['user_type'];
    $userid = $rse['id'];

}
if(isset($_POST['u']['insert'])){
    $u = $_POST['u'];
    $sqli = "INSERT INTO user (firstname, lastname, username, password, tel, email, user_type) 
    VALUE ('".$u['firstname']."','".$u['lastname']."','".$u['username']."','".$u['password']."','".$u['tel']."','".$u['email']."','".$u['user_type']."')";
    $rs = mysqli_query($conn,$sqli);
}

if(isset($_POST['u']['edit'])) {
    $u = $_POST['u'];
    $sqlu = "UPDATE user SET 
            firstname='".$u['firstname']."',
            lastname='".$u['lastname']."',
            username='".$u['username']."',
            password='".$u['password']."',
            tel='".$u['tel']."',
            email='".$u['email']."',
            user_type='".$u['user_type']."'
            WHERE id = '".$u['id']."'";
            $rsu = mysqli_query($conn,$sqlu);
}

if(isset($_GET['did'])){
    $sqld = "DELETE FROM user WHERE id = '".$_GET['did']."'";
    $rsd = mysqli_query($conn,$sqld);
}



$sql = "SELECT * FROM user";
$result = mysqli_query($conn,$sql);
?>
<body>
<h3>เพิ่มข้อมูล</h3>
<form method="post" action=" <?php echo $_SERVER['PHP_SELF'] ?>">
<?php if(isset($_GET['eid'])) {?>
    <input type="hidden" name="u[edit]" value="1">
    <input type="hidden" name="u[id]" value="<?php echo $userid;?>">
<?php }else{ ?>
    <input type="hidden" name="u[insert]" value="1">
<?php } ?>
    <table>
    <tr>
        <td>ชื่อ</td>
        <td><input type="text" name="u[firstname]" value = "<?php echo $firstname?>"></td>
        <td>นามสกุล</td>
        <td><input type="text" name="u[lastname]" value = "<?php echo $lastname?>"></td>
    </tr>
    <tr>
        <td>Username</td>
        <td><input type="text" name="u[username]" value = "<?php echo $username?>"></td>
        <td>Password</td>
        <td><input type="text" name="u[password]" value = "<?php echo $password?>"></td>
    </tr>
    <tr>
        <td>เบอร์โทร</td>
        <td><input type="text" name="u[tel]" value = "<?php echo $tel?>"></td>
        <td>E-mail</td>
        <td><input type="text" name="u[email]"value = "<?php echo $email?>"></td>
    </tr>
    <tr>
        <td>กลุ่มผู้ใช้</td>
        <td>
            <select name="u[user_type]">
                <option value="admin" <?php if($user_type == "admin") {?>selected="selected"<?php }?>>Admin</option>
                <option value="exe" <?php if($user_type == "exe") {?>selected="selected"<?php }?>>ผู้ใช้ทั่วไป</option>
            </select>
        </td>
    </tr>
    <tr>
        <td><input type = "submit" value = "บันทึก"></td>
    </tr>
</table>
</form>


<table border = "1">
<h3>ข้อมูลผู้ใช้</h3>
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
        <td>
        <a href = "<?php echo $_SERVER['PHP_SELF'];?>?eid=<?php echo $rs['id'];?>">แก้ไข</a> 
        <a href = "<?php echo $_SERVER['PHP_SELF'];?>?did=<?php echo $rs['id'];?>" onclick = "return confirm('ต้องการลบใช่หรือไม่');">ลบ</a> 
        </td>
    </tr>
    <?php } ?>
    </table>
</body>
    <?php 
    include 'footer.php';
    ?>  