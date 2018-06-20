<?php 

namespace con;
use pdo;
/**
 * 
 */
class user
{
	function logout(){
		session_id('geans');
		session_start();
		unset($_SESSION['user']);
	}
	function insertpost(){
		session_id('geans');
		session_start();
		$id = $_SESSION['user']['id'];
		$post = $_GET['post'];
		$db_host = "localhost";
        $db_nome = "connexus";
        $db_usuario = "root";
        $db_senha = "";
        $db_driver = "mysql";
		$db = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
		$sql = $db->prepare('insert into post(id,psot) values (:id,:post)');
		$sql->bindValue(':id',$id);
		$sql->bindValue(':post',$post);
		$sql->execute();
	}
	function loadpost() {
		session_id('geans');
		session_start();
		$id = $_SESSION['user']['id'];
		$db_host = "localhost";
        $db_nome = "connexus";
        $db_usuario = "root";
        $db_senha = "";
        $db_driver = "mysql";
		$db = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
		$sql = $db->prepare("select p.psot , u.nome  from post p , user u  where p.id = u.id order by p.cod desc");
		$sql->bindValue(':id',$id);
		$sql->execute();
		$posts = $sql->fetchAll();
		$code = '';

		foreach ($posts as $key => $value) {

			$code .= '<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
         
          <span class="w3-right w3-opacity">1 min</span>
          <h4>'.$value["nome"].'</h4><br>
          <hr class="w3-clear">
          <p>'.$value["psot"].'</p>
          
          <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i> &nbsp;Curtir</button> 
          <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i> &nbsp;Comentar</button> 
        </div>';
		}
		echo(json_encode($code, JSON_UNESCAPED_SLASHES));
        
	}
	function pushuser(){
		session_id('geans');
		session_start();
		$id = $_SESSION['user'];
		$db_host = "localhost";
        $db_nome = "connexus";
        $db_usuario = "root";
        $db_senha = "";
        $db_driver = "mysql";
		$db = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
		$sql = $db->prepare("select * from user where id = :id ");
		$sql->bindValue(":id",$id['id']);
		$sql->execute();

		echo(json_encode($sql->fetchAll()[0]));
	}
	function checkuser($dados) {
		header('Content-type: application/json');
 		$id = $_GET['id'];
 		$senha = $_GET['senha'];

 		$db_host = "localhost";
        $db_nome = "connexus";
        $db_usuario = "root";
        $db_senha = "";
        $db_driver = "mysql";
		$db = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
		$sql = $db->prepare("select id from user where login = :login and senha = :senha ");
		$sql->bindValue(":login",$id);
		$sql->bindValue(":senha",$senha);
		$sql->execute();
		if ($sql->rowCount()>0){
			$return['data']=[true];
			session_id('geans');
			session_start();
			$_SESSION['user'] = $sql->fetchAll()[0];
			echo json_encode($return);
		

		}else { 
			$return['data']=[false];
			echo json_encode($return);
			 }


	}

	function validateuser(){
		session_id('geans');
		session_start();

		if(isset($_SESSION['user'])){
			$return['data']=[true];
			echo json_encode($return);
		}else {
			$return['data']=[false];
			echo json_encode($return);
		}
	}

	

}