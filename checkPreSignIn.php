<?php
session_start();
require "connectbd.php";
$phone = isset($_POST['phone']) ? trim($_POST['phone']) :false;
$pass = isset($_POST['password']) ? trim($_POST['password']) :false;
$name = trim($_POST['name']);
?>
<script>
let phone ='<?php if ($phone) echo $phone; ?>';
if (phone!='') {if (phone.match(/7[0-9]{10}/)) {<?php
                                                    // setcookie('phone',$phone , time()+3600, '/');
                                                    $_SESSION['phone'] = $phone ;
                                                    // setcookie('name',$name , time()+3600, '/');
                                                    $_SESSION['name'] = $name ;
                                                    // setcookie('pass',$pass , time()+3600, '/');
                                                    $_SESSION['pass'] = $pass ;
                                                ?>
                         location.href='checkSignIn.php';} 
                    else {//alert("Номер телефона не соответствует шаблону");
                        <?php
                            $check = 'one';
                            // setcookie('check', $check , time()+3600, '/');
                            $_SESSION['check'] = $check ;
                        ?>
                            location.href='index.php';} }
</script>