<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'login_signup');
class DB_con
{
function __construct()
{
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->db=$con;

if (mysqli_connect_errno())
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
}

public function usernameavailblty($uname) {
	$result =mysqli_query($this->db,"SELECT Username FROM tblusers WHERE Username='$uname'");
	return $result;
}

public function uemailavailblty($email) {
	$result =mysqli_query($this->db,"SELECT UserEmail FROM tblusers WHERE UserEmail='$email'");
	return $result;
}

public function registration($fname,$uname,$uemail,$pasword)
{
$ret=mysqli_query($this->db,"insert into tblusers(FullName,Username,UserEmail,Password) values('$fname','$uname','$uemail','$pasword')");
return $ret;
}

public function signin($uname,$pasword)
	{
	$result=mysqli_query($this->db,"select id,FullName from tblusers where Username='$uname' and Password='$pasword'");
	return $result;
	}

    function runBaseQuery($query) {
                $result = mysqli_query($this->db, $query);
                while($row=mysqli_fetch_assoc($result)) {
                $resultset[] = $row;
                }       
                if(!empty($resultset)){
                return $resultset;
                }
    }
    
    function numRows($query) {
        $result  = mysqli_query($this->db, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;   
    }
    
    function executeQuery($query) {
        $result  = mysqli_query($this->db, $query);
        return $result; 
    }
}
?>