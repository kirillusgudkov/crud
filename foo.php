<?php 

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
include 'db.php';

$name = $_POST['name'];
$text = $_POST['text'];
$get_id = $_GET['id'];
$ip = $_SERVER['REMOTE_ADDR']; 

//add post

if (isset($_POST['add'])) {
	if ($name!=null or $text!=null) {
		$sql = ("INSERT INTO lists (name, text, likes) VALUES (?,?,0)");
		$query = $pdo->prepare($sql);
		$query->execute([$name, $text]);
		if ($query) {
			header('Location: http://localhost');
		}
	}
	else {
		echo '<script type="text/javascript">';
	    echo 'alert("Заполните все поля!");';
	    echo 'setTimeout(function(){';
		echo 'window.location.replace("http://localhost");';
		echo '}, 000);';
	    echo '</script>';
		exit;

	}
}


//вывод
$sql = $pdo->prepare("SELECT * FROM lists");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['likein'])) {

	$mysql = new mysqli('localhost', 'root', 'root', 'crud');
	$mysql_ip = $mysql->query("SELECT * FROM `likes` WHERE client_ip='$ip' and post_id = '$get_id'");
	$mysql_ip = $mysql_ip->fetch_assoc();
    //$r = mysql_query("SELECT * FROM vote_ip WHERE id_resp='$id' AND ip='$ip'"); // проверяем юзера на IP
    if($mysql_ip!=null) {
        // Ошибка если уже голосовали
		echo '<script type="text/javascript">';
     	echo 'alert("Вы уже ставили лайк на этот пост");';
     	echo 'setTimeout(function(){';
		echo 'window.location.replace("http://localhost");';
		echo '}, 000);';
     	echo '</script>';
        //header('Location: http://localhost');
        exit;
    }
    else {
    $mysql = new mysqli('localhost', 'root', 'root', 'crud');
	$mysql_user = $mysql->query("SELECT * FROM `lists` WHERE id = '$get_id'");
	$mysql_user = $mysql_user->fetch_assoc();
	$likesc = $mysql_user['likes']+1;
	$sql = ("UPDATE lists SET likes=$likesc WHERE id=?");
	$query = $pdo->prepare($sql);
	$query->execute([$get_id]);

	$sql = ("INSERT INTO likes (client_ip, post_id) VALUES (?,?)");
	$query = $pdo->prepare($sql);
	$query->execute([$ip, $get_id]);
	
    }




	if ($query) {
		header('Location: http://localhost');
	}
}
//exit("$mysql_ip[id]");
?>