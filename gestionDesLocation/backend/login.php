<?php
	session_start();
	$t= hexdec(substr($_SERVER["REMOTE_ADDR"], 0, 2)). "." . hexdec(substr($_SERVER["REMOTE_ADDR"], 2, 2)). "." . hexdec(substr($_SERVER["REMOTE_ADDR"], 5, 2)). "." . hexdec(substr($_SERVER["REMOTE_ADDR"], 7, 2));
	require('db_cnx.php');
	$con=connect_bd();
	$get_banned_ip=$con->prepare("SELECT MAX(banned) AS max,MIN(banned) AS min FROM banned_ips where ip= INET_ATON(?)");
	$get_banned_ip->bindParam(1,$t,PDO::PARAM_STR);
	$get_banned_ip->execute();
	$res=$get_banned_ip->fetch(PDO::FETCH_ASSOC);
	$time = $con->query("SELECT UNIX_TIMESTAMP(STR_TO_DATE(NOW(), '%Y-%m-%d %H:%i:%s')) as now");
	$res2 = $time->fetch(PDO::FETCH_ASSOC);
	if(isset($res['max']) && isset($res2['now']) )
	{
		$delay =$res['max'] - $res2['now'];
	//	echo $res['max'].'           '.$res2['now'];
	$url='bruteindex.php?max='.$res['max'].'&min='.$res2['now'];
	if($res['min']==1){
		header('Location:bruteindex.php');
		exit();

	}else if($delay>0 && $res2['now']!=1){
		header("Location:$url");
		exit();

}
}





	function bruteforce(PDO $pdo,$user,$ip){
		  $time_frame_minutes = 10;
			$bad_login_limits =array(1,4,5);
			$add_failed_attempt = $pdo->prepare("INSERT INTO user_failed_logins(user, ip_address, attempted_at) VALUES (?,INET_ATON(?),NOW())");
			$add_failed_attempt->bindParam(1, $user, PDO::PARAM_STR);
			$add_failed_attempt->bindParam(2, $ip, PDO::PARAM_STR);
			$add_failed_attempt->execute();
			$latest_failed_attempts = $pdo->prepare("SELECT DISTINCT * FROM user_failed_logins WHERE user=?  AND attempted_at > DATE_SUB(NOW(), INTERVAL ? MINUTE)");
			$latest_failed_attempts->bindParam(1, $user, PDO::PARAM_STR);
			$latest_failed_attempts->bindParam(2, $time_frame_minutes, PDO::PARAM_INT);
			$latest_failed_attempts->execute();
			$latest_failed_logins=$latest_failed_attempts->rowCount();
			$latest_failed_attempts = $pdo->prepare("SELECT DISTINCT * FROM user_failed_logins WHERE (ip_address=INET_ATON(?)) AND attempted_at > DATE_SUB(NOW(), INTERVAL ? MINUTE)");
			$latest_failed_attempts->bindParam(1, $ip, PDO::PARAM_STR);
			$latest_failed_attempts->bindParam(2, $time_frame_minutes, PDO::PARAM_INT);
			$latest_failed_attempts->execute();
			$latest_failed_ips=$latest_failed_attempts->rowCount();
			switch ($latest_failed_logins) {
					case ($bad_login_limits[1]>$latest_failed_logins &&  $latest_failed_logins>= $bad_login_limits[0] ):
						//echo '<script>alert(user'.$latest_failed_logins.')</script>';
						$add_ban_10U = $pdo->prepare("UPDATE agence SET banned = (UNIX_TIMESTAMP(STR_TO_DATE(NOW(), '%Y-%m-%d %H:%i:%s')) + 600) WHERE username=?");
						$add_ban_10U->bindParam(1, $user, PDO::PARAM_STR);
						$add_ban_10U->execute();

						break;
						case ($bad_login_limits[2]>$latest_failed_logins && $latest_failed_logins>=$bad_login_limits[1]):
							//echo '<script>alert(user'.$latest_failed_logins.')</script>';
							$add_ban_60U = $pdo->prepare("UPDATE agence SET banned = (UNIX_TIMESTAMP(STR_TO_DATE(NOW(), '%Y-%m-%d %H:%i:%s')) + 3600) WHERE username=?");
							$add_ban_60U->bindParam(1, $user, PDO::PARAM_STR);
							$add_ban_60U->execute();


							break;
							case ($latest_failed_logins>=$bad_login_limits[2]):
							//echo '<script>alert(user'.$latest_failed_logins.')</script>';
							$add_ban_PERU = $pdo->prepare("UPDATE agence SET banned = 1 WHERE username=?");
							$add_ban_PERU->bindParam(1, $user, PDO::PARAM_STR);
							$add_ban_PERU->execute();

								break;

			}
			switch ($latest_failed_ips) {
					case ($bad_login_limits[1]>$latest_failed_ips &&  $latest_failed_ips>= $bad_login_limits[0] ):
						echo '<script>alert(ip'.$latest_failed_ips.')</script>';
						$add_ban_10 = $pdo->prepare(" REPLACE INTO banned_ips(ip,banned) VALUES (INET_ATON(?),(UNIX_TIMESTAMP(STR_TO_DATE(NOW(), '%Y-%m-%d %H:%i:%s')) + 600))");
						$add_ban_10->bindParam(1, $ip, PDO::PARAM_STR);
						$add_ban_10->execute();

						break;
						case ($bad_login_limits[2]>$latest_failed_ips && $latest_failed_ips>=$bad_login_limits[1]):

							echo '<script>alert(ip'.$latest_failed_ips.')</script>';
							$add_ban_60 = $pdo->prepare("UPDATE banned_ips SET banned = (UNIX_TIMESTAMP(STR_TO_DATE(NOW(), '%Y-%m-%d %H:%i:%s')) + 3600) WHERE ip=INET_ATON(?)");
							$add_ban_60->bindParam(1, $ip, PDO::PARAM_STR);
							$add_ban_60->execute();


							break;
							case ($latest_failed_ips>=$bad_login_limits[2]):
							echo '<script>alert(ip'.$latest_failed_ips.')</script>';
							$add_ban_PER = $pdo->prepare("UPDATE banned_ips SET banned = 1 WHERE ip=INET_ATON(?)");
							$add_ban_PER->bindParam(1, $ip, PDO::PARAM_STR);
							$add_ban_PER->execute();

								break;

			}



			return  ;
	}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V5</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="js/sweetalert.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
		  <script src="js/sweetalert.min.js"></script>
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form id="f1" class="login100-form validate-form flex-sb flex-w" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
					<span class="login100-form-title p-b-53">
						Sign In
					</span>


					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Username
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="usr" >
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>

						<a href="#" class="txt2 bo1 m-l-5">
							Forgot?
						</a>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" >
						<span class="focus-input100"></span>
					</div>
					<?php

					?>

					<div class="p-t-13 p-b-9"><div class="g-recaptcha" float="right" data-sitekey="6Lf0m1YUAAAAACMX0DlFfnKksYransYkSI91xcHL" ></div></div>


					<div class="container-login100-form-btn m-t-17">





						<button class="login100-form-btn" id="sub">
							Sign In
						</button>

					</div>


					<div class="w-full text-center p-t-55">
						<span class="txt2">
							Not a member?
						</span>

						<a href="#" class="txt2 bo1">
							Sign up now
						</a>
					</div>
					<?php
			//		echo '<script>alert(\'gggggggggg\')</script>';
					function login(){
					if(isset($_POST['usr']) && isset($_POST['pass'])){
					$pdo = connect_bd();
					$_SESSION['usr']=$_POST['usr'];
					$_SESSION['pass']= $_POST['pass'];
					$q1= 'select * from admin where username=?';
					$q2= 'select * from agence where username=?';
					$r1=$pdo->prepare($q1);
					$r1->bindParam(1, $_SESSION['usr'], PDO::PARAM_STR);
					$r1->execute();
					$r2=$pdo->prepare($q2);
					$r2->bindParam(1, $_SESSION['usr'], PDO::PARAM_STR);
					$r2->execute();
					$n1=$r1->rowCount();
					$n2=$r2->rowCount();
					$l2=$r2->fetch(PDO::FETCH_ASSOC);
					$l1=$r1->fetch(PDO::FETCH_ASSOC);
					 if($_SESSION['usr']==$l1['username'] && password_verify($_SESSION['pass'], $l1['password'])) {
						 $_SESSION['superusr']='yup';
						 return true;
					 }
						else if($_SESSION['usr']==$l2['username'] && password_verify($_SESSION['pass'], $l2['password'])) {
							global $res2;
							global $url;
							$userdelay=$l2['banned'] - $res2['now'];
							if($l2['banned']==1 OR $userdelay>0){
								header("Location:$url");
								exit();

							}

							$_SESSION['idA']=$l2['idA'];
							return true;
							}else  {
								$t= hexdec(substr($_SERVER["REMOTE_ADDR"], 0, 2)). "." . hexdec(substr($_SERVER["REMOTE_ADDR"], 2, 2)). "." . hexdec(substr($_SERVER["REMOTE_ADDR"], 5, 2)). "." . hexdec(substr($_SERVER["REMOTE_ADDR"], 7, 2));

							bruteforce($pdo,$_SESSION['usr'],$t);
							 echo "<script>swal({  title: 'Error!',text: 'You have entered an invalid username or password',icon: './images/err.png'});</script>";
						 }}


					}

					if(isset($_POST['usr']) && isset($_POST['pass'])){
						$url='https://www.google.com/recaptcha/api/siteverify';
						$privatekey ='6Lf0m1YUAAAAACa2cv52A7PgC62gUPyiepuyNTxC';
						$response = file_get_contents($url."?secret=".$privatekey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
						$data =json_decode($response);
							if(isset($data->success) AND $data->success ==true){
								if(login())
									echo "<script>window.location.href = 'index.php';</script>";
								}else{
									echo "<script>swal({  title: 'Error!',text: 'Invalid captcha code. Please try again.',icon: './images/err.png'});</script>";

								}




}

					?>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script>

	$(document).ready(function(){
	$("#sub").click(function(){
			$("#f1").submit();
	});
});
	</script>

</body>
</html>
