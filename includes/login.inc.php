<?php
	include ("db.inc.php");
	session_start();

<<<<<<< HEAD

	function LoggedIn() {
		
		if (isset($_SESSION['loggedin'])) {
			return true;
		}else{
			return false;
		}
	}

=======
	function LoggedIn() {
		if (isset($_SESSION['loggedin'])) {
			echo ("
				<li><span id=\"loggedIn\">Logged in as <b>".$_SESSION['loggedin']."</b></span>
					<ul>
						<li><a href=\"./log-out\">Logout</a></li>
					</ul>
				</li>");
		}else{
			echo ("<li><a id=\"loginBtn\" href=\"javascript:;\">Login</a></li>");
		}
	}
>>>>>>> origin/master
	function TryLogin($user, $pass) {
		// strip tease
		$u = strip_tags($user);
		$u = mysql_real_escape_string($u);
		$p = strip_tags($pass);
		$p = mysql_real_escape_string($p);
<<<<<<< HEAD
		$ret = mysql_query("SELECT salt FROM admin WHERE (user = '$u');");
		$fetch = mysql_fetch_assoc($ret);
		$p = hashPassword($p, $fetch['salt']);
=======
		$p = md5($p);
>>>>>>> origin/master

		$ret = mysql_query("SELECT * FROM admin WHERE (user = '$u' and pass = '$p');");
		
		if (mysql_num_rows($ret) > 0) {
			$_SESSION['loggedin'] = $u;
<<<<<<< HEAD
			
			$fetch = mysql_fetch_assoc($ret);
			$_SESSION['uid'] = $fetch['adminID'];
			$_SESSION['email'] = $fetch['email'];
=======
			$_SESSION['uid'] = mysql_fetch_assoc($ret)['adminID'];
>>>>>>> origin/master
			return true;
		}
		mysql_free_result($ret);

		return false;

	}

<<<<<<< HEAD
	function GetUserName() {
		return $_SESSION['loggedin'];
	}
	function GetEmail() {
		return $_SESSION['email'];
	}

=======
>>>>>>> origin/master
	function SendHash($email) {
		$email = mysql_real_escape_string($email);
		$email = strip_tags($email);

		$ret = mysql_query("SELECT * FROM admin WHERE (email = '$email');");

		if (mysql_num_rows($ret) > 0) {

<<<<<<< HEAD
			echo ("<div id=\"account\">An email regarding how to change your password has been sent!</div>");
=======
			echo ("<p>An email regarding how to change your password has been sent!</p>");
>>>>>>> origin/master
			MailReset($email);
			header ("refresh: 5; url=./");

		}else {

<<<<<<< HEAD
			echo ("<div id=\"account\">That email doesn't exist in our database.</div>");
=======
			echo ("<p>That email doesn't exist in our database.</p>");
>>>>>>> origin/master
			header ("refresh: 3; url=./");
		}
	}

	function MailReset($email) {
		$ret = mysql_query("SELECT * FROM admin WHERE (email = '$email');");
                $tmp = mysql_fetch_assoc($ret);
		$uID = $tmp['adminID'];
		$user = $tmp['user'];
		$pass = $tmp['pass'];
<<<<<<< HEAD
		$salt = $tmp['salt'];
                $site = "http://".$_SERVER['HTTP_HOST']."";
		$link = "$site/reset-$uID-$salt";
		$changeMsg = "<img src=\"$site/images/logo.png\" alt=\"4ME\" style=\"max-height: 120px;\"><br><big>Hi $user,</big><br /><p>It's unfortunate that you forgot your password.</p><br><p>To reset go to $link</p><br><br>Thanks,<br>4 Me";
		mail($email, "Change Password for 4 Me", $changeMsg, "Content-type:text/html;\r\nFrom: noreply@malcam4me.kiwi");
	}

function generateRandomString($length = 20) {
    	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$charactersLength = strlen($characters);
    	$randomString = '';
    	for ($i = 0; $i < $length; $i++) {
        	$randomString .= $characters[rand(0, $charactersLength - 1)];
    	}
    	return $randomString;
    }
	
	function hashPassword($password, $salt)
	{
		$passwordSalt = $password . $salt;
		$hashed = hash("SHA256", $passwordSalt);
		return $hashed;
	}
	
	function comparePassword($password1, $password2)
	{
		if ($password1 == $password2)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
=======
		$hash = $tmp['resetHash'];
                $site = "http://".$_SERVER['HTTP_HOST']."/preview";
		$link = "$site/reset-$uID-$hash";
		$changeMsg = "<img src=\"$site/images/logo.png\" alt=\"4ME\"><br><big>Hi $user,</big><br /><p>It's unfortunate that you forgot your password.</p><br><p>To reset go to $link</p><br><br>Thanks,<br>4 Me";
		mail($email, "Change Password for 4 Me", $changeMsg, "Content-type:text/html;\r\nFrom: noreply@4me.ninja");
	}
>>>>>>> origin/master
?>