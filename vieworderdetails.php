<?php
require("adminmaster.php");
include("connection.php");

$OrderId = $_GET['Id'];
if($OrderId == "" || $OrderId == null || $OrderId < 0)
{
	$OrderId = 0;
}

$sql = "SELECT os.*,eq.Name FROM orderdetails os INNER JOIN Equipment eq ON os.EquipmentID = eq.ID WHERE os.OrderID = $OrderId";
$result = mysqli_query($conn, $sql);

?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Order Information</a></li>
                   
                    <li class="breadcrumb-item active">Orderdetails</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
		<form action ="viewequipment.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                        
							<div class="col-md-12">
								<table width='100%' class="table">						
								<tr>
									 <th>ID</th> <th>Equipmentname</th><th>OrderID</th><th>Ordertype</th><th>Qty</th><th>Price</th>
								</tr>
								<?php  
									while($data = mysqli_fetch_array($result))
									{         
										echo "<tr>";
									
										echo "<td>".$data['ID']."</td>";
										echo "<td>".$data['Name']."</td>";
										echo "<td>".$data['OrderID']."</td>";
										echo "<td>".$data['OrderType']."</td>";
										echo "<td>".$data['Qty']."</td>";
										echo "<td>".$data['Price']."</td>";
										
										
										
        								//echo "<td><a href='update_technician.php?Id=$data[Id]'>Update</a> | <a href='deletetechnician.php?Id=$data[Id]'>Delete</a></td></tr>";        
									}
	
								?>
								</table>
							</div>
	                        
							
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Country End -->
        </form>
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </body>
</html>


