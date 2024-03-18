<?php
namespace codevoordeopdracht\classes\user;
// Author:nouaman

use Login\classes\Database;
use PDO;

session_start();

class User {
    private $db;
    public $username; 

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=login', 'root', ''); // Assuming the password is empty for localhost
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }

    public function registerUser($username, $password, $role = 'gebruiker') {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 
        $sql = "INSERT INTO user (username, password, role) VALUES (:username, :hashedPassword, :role)";
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':hashedPassword', $hashedPassword); 
        $stmt->bindValue(':role', $role);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function loginUser($username, $password) {
        $sql = "SELECT password, role FROM user WHERE username = :username";
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role'];
            $this->username = $username; 
            return true;
        } else {
            return false;
        }
    }
    
    public function GetUser() {
        if (!$this->IsLoggedin()) {
            return false;
        }
    
        $query = "SELECT username FROM user WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $params = array($_SESSION['username']);
        
        try {
            $stmt->execute($params);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user) {
                $this->username = $user['username'];
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
        
        return true;
    }
    
    public function IsLoggedin() {
        return isset($_SESSION['username']);
    }

    public function ShowUser() {
        if (isset($this->username)) { 
            echo "username: " . $this->username;
        } else {
            echo "No username set";
        }
    }
    
    public function Logout() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        $_SESSION = array();
        session_destroy();
    
        header('Location: index.php');
        exit;
    }  
}

?>