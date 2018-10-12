<h1>FORM LOGIN</h1>
  <form action="#" method="post">  
    <table>
    <tr>
      <td>NIM</td>
      <td>:</td>
      <td><input type="number" name="nim" length="10"></td>
    </tr>
    <tr>
      <td>PASSWORD</td>
      <td>:</td>
      <td><input type="text" name="password"></td>
    </tr>
  </table>
  <br><input type="submit" name="login" value="login">
  </form>

<?php 
if (isset($_POST['login'])) {
  session_start();
  $nim=$_POST['nim'];
  $password=$_POST['password'];

  $host="localhost";
  $user="root";
  $pass="";
  $db="pendaftaran_db";
  $conn=mysqli_connect($host,$user,$pass,$db);

  $sql=$conn->query("SELECT `nim`,`password` FROM `pendaftaran` WHERE `nim`='$nim' AND `password`='$password'");
  $row=mysqli_fetch_array($sql);
  
    if($nim==$row[0]&&$password==$row[1]){
      $_SESSION['nim']=$nim;
      $_SESSION['password']=$password;
    }else{
      echo "LOGIN GAGAL";
    }
}
?>