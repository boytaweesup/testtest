<?php

    require_once 'config.php';

    class Database extends Config {
        public function insert($fname, $lname, $email, $userpassword) {
            $sql = "INSERT INTO users(first_name, last_name, email, userpassword) VALUES(:fname, :lname, :email, :userpassword)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'userpassword' => $userpassword
            ]);
            return true;
        }

        public function insertmember($username, $email, $password) {
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO member(username, email, password) VALUES(:username, :email, :password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'username' => $username,                
                'email' => $email,
                'password' => $pass
            ]);
            return true;
        }

        public function insertproduct($Product_Name, $Product_Price, $Product_color, $Product_Amount) {
            
            $sql = "INSERT INTO product(Product_Name, Product_Price, Product_color, Product_Amount) VALUES(:Product_Name, :Product_Price, :Product_color, :Product_Amount)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'Product_Name' => $Product_Name,                
                'Product_Price' => $Product_Price,
                'Product_color' => $Product_color,
                'Product_Amount' => $Product_Amount
            ]);
            return true;
        }

        public function insertOrder($Order_Product, $Order_Amount, $Order_color) {
            // var_dump($Order_Product);
            // var_dump($Order_Amount);
            // var_dump($Order_color);die();
            $sql = "INSERT INTO order(Order_Product, Order_Amount, Order_color) VALUES(:Order_Product, :Order_Amount, :Order_color)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'Order_Product' => $Order_Product,
                'Order_Amount' => $Order_Amount,                
                'Order_color' => $Order_color
                
            ]);
            return true;
        }

        public function login($email, $pass) {

            
    	$sql = "SELECT * FROM member WHERE email = ?";
    	$stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);

        if($stmt->rowCount() == 1){
            $user = $stmt->fetch();
  
            $sqlusername =  $user['username'];
            $sqlpassword =  $user['password'];
            $sqlemail =  $user['email'];
              
            if($sqlemail === $email){
               if(password_verify($pass, $sqlpassword)){
                   
                   $_SESSION['username'] = $sqlusername;
                   $_SESSION['email'] = $sqlemail;
//   var_dump($_SESSION['username']);die();
                //    header("Location: ../index.php");
                   exit;
               }else {
                 $em = "Incorect User name or password";
                 
                 exit;
              }
  
            }else {
              $em = "Incorect User name or password";
              
              exit;
           }
  
        }else {
           $em = "Incorect User name or password";
          
           exit;
        }

           
        }

        public function selectorder() {
            $sql = "SELECT * FROM product ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchALL();
            return $result;
        }


        public function read() {
            $sql = "SELECT * FROM users ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchALL();
            return $result;
        }

        public function readOne($id) {
            $sql = "SELECT * FROM users WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetch();
            return $result;
        }

        public function update($id, $fname, $lname, $email, $phone) {
            $sql = "UPDATE users SET first_name = :fname, last_name = :lname, email = :email, phone = :phone WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'phone' => $phone,
                'id' => $id
            ]);
            return true;
        }

        public function delete($id) {
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(["id"=> $id]);
            return true;
        }

        public function insertuser($fname, $lname, $email, $phone) {
            $sql = "INSERT INTO users(first_name, last_name, email, phone) VALUES(:fname, :lname, :email, :phone)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'phone' => $phone
            ]);
            return true;
        }
     }

?>
