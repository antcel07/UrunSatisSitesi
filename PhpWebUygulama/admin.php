<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KeremCelik20090700006</title>
<link rel="stylesheet" type="text/css" href="stil.css">


</head>

<body>


<div id="genel2">
   

   
 
  

<div id="ust">
<img src="images/loginHeader.jpg" width="700px" height="200px"/>
</div>


 <div id="adminSol">
            <table class="auto-style7">
                <tr>
                    <td><strong>MENÜLER</strong></td>
                </tr>
                <tr>
                    <td class="auto-style8"></td>
                </tr>
                <tr>
                    <td style="border: thin solid #FFFFFF"><a href="Kategorilerr.aspx">Anasayfa</a> </td>
                </tr>
                <tr>
                    <td style="border: thin solid #FFFFFF"><a href="Yemeklerr.aspx">Hizmetler</a></td>
                </tr>
                <tr>
                    <td style="border: thin solid #FFFFFF"><a href="Yorumlarr.aspx">Ürünler</a></td>
                </tr>
                <tr>
                    <td class="auto-style9" style="border: thin solid #FFFFFF"><a href="AdminMesajlar.aspx">Yılbaşına Özel Fırsat Ürünleri</a></td>
                </tr>
                <tr>
                    <td style="border: thin solid #FFFFFF"><a href="GununYemegiAdmin.aspx">Hesabım</a></td>
                </tr>
                <tr>
                    <td style="border: thin solid #FFFFFF"><a href="AdminTarifOneri.aspx">İletişim</a></td>
                </tr>
               
            </table>
         
        </div>

<div id="adminSag">
<div id=adminSagBaslik>ÜRÜN LİSTESİ</div>

  
  
   <?php
	 $servername="localhost";
	 $username="root";
	 $password="";
	 $dbname="webproje";
	 
	 $conn=mysqli_connect($servername,$username,$password,$dbname);
	 $sql="SELECT * FROM magaza";
$sonuc= mysqli_query($conn, $sql);

if(mysqli_num_rows($sonuc)>0)
{
	while($cek= mysqli_fetch_assoc($sonuc)){
	






echo "<div class='adminUrun'>".$cek['urunAdi']."</div>";


echo "<div class='gnclle'><a href='guncele.php?guncellenecekId=".$cek['katId']."'><img src='images/güncelle.png' style='width:30px;height:30px;'/></a></div>";
echo "<div class='sil'><a href='admin.php?silinecekId=".$cek['katId']."'> <img src='images/sil.png' style='width:30px;height:30px;'/> </a></div><br><br>";

				 
	}
}
else
{
		echo "hata kodu".mysqli_error($conn);
}


	 
	 ?>
  
  
  
  <?php
//silme
$servername="localhost";
	 $username="root";
	 $password="";
	 $dbname="webproje";
	 
	 	$connx=mysqli_connect($servername,$username,$password,$dbname);
		if (isset($_GET['silinecekId']))
		{
$gelenId=$_GET["silinecekId"];


$sql2="DELETE FROM magaza  WHERE katId=$gelenId";

if(mysqli_query($connx,$sql2))
{
	echo "kod basariyla silindi";
}

else
{
		echo "hata kodu".mysqli_error($connx);
}

		}




?>
  
  
  
  
  
  
  
  <div id=adminSagBaslik2>ÜRÜN EKLEME</div>
 

<div id="ekleDuzen">
 <form action="admin.php" method="post" >

Ürün Adı: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <input type="text" name="urun_Adi"><br>
Ürün Fiyatı:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="urun_Fiyat"><br>
Ürün Kategorisi:&nbsp&nbsp<input type="text" name="urun_Kategori"><br>
Ürün Resmi:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="urun_Resim"><br><br>

&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" value="Ekle" name="ekle" class="button">


</form>

</div>
<?php



 

if (isset($_POST["ekle"])) {
			
	
  $adi=$_POST["urun_Adi"];
$fiyat=$_POST["urun_Fiyat"];
$kategori=$_POST["urun_Kategori"];
$resim=$_POST["urun_Resim"];


 $servername="localhost";
	 $username="root";
	 $password="";
	 $dbname="webproje";
	 
	 	$conn=mysqli_connect($servername,$username,$password,$dbname);
$sql="INSERT INTO `magaza` (`urunAdi`, `urunFiyat`, `katAdi`,`urunResim`) VALUES ('$adi','$fiyat','$kategori','$resim')";


if(mysqli_query($conn,$sql))
{
	echo "Kayıt başarıyla eklendi";
}

else
{
		echo "hata kodu".mysqli_error($conn);
}
}


mysqli_close($conn);



?>



  


</div>

   
   </div>
   </body>
</html>