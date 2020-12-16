<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<?php
$q = intval($_GET['q']);
include 'db.php';

echo "<table id='lipampesa1' class='table table-striped table-bordered' style='width:100%'>
            <thead>
            <tr>
                <th>ID</th>
                <th>Serial Number</th>
                <th>RegistrationNumber</th>
                <th>Dealer</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>";
		# code...
        $sql="SELECT * from `work` where  reg_no LIKE '%".$q."%' OR serial LIKE '%".$q."%' AND problem='INSTALLATION' limit 10 ";
		$result=mysqli_query($conn,$sql);
		while ($row=mysqli_fetch_array($result)) {
			$name=$row['serial'];
                                    
		  echo "<tr id='datarow'>";
		  echo "<td>" . $row['id'] . "</td>";
		  echo "<td>" . $row['serial'] . "</td>";
		  echo "<td>" . $row['reg_no'] . "</td>";
		  echo "<td>" . $row['dealer'] . "</td>";
		  echo "<td>" . $row['date'] . "</td>";
		  echo "<td class='btn btn-primary'>" .'Click to renew'. "</td>";
		  echo "</tr>";
}
echo "</tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Serial Number</th>
                <th>RegistrationNumber</th>
                <th>Dealer</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>";
mysqli_close($conn);
?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
function showVehicle(str) {
  if (str=="") {
    //document.getElementById("txtHint").innerHTML="";
    return;
  }
  //alert(str);
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("lipampesa1").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getVehicles.php?q="+str,true);
  xmlhttp.send();
}

$(document).ready(function(){
 $('#framework').multiselect({
  nonSelectedText: 'Select Reg',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });
 
 
  });
$(document).ready(function(){
 $('#framework1').multiselect({
  nonSelectedText: 'Select Client',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });
 
 
  });
  
  $(document).ready(function() {
    $('#lipampesa1').DataTable();
} );

function addRowHandlers() {
  var table = document.getElementById("lipampesa1");
  var rows = table.getElementsByTagName("tr");
  for (i = 0; i < rows.length; i++) {
    var currentRow = table.rows[i];
	//console.log(currentRow);
    var createClickHandler = function(row) {
      return function() {
        var cell = row.getElementsByTagName("td")[1];
        var serial = cell.innerHTML;
		var mpesacode = document.getElementById("mpesa").value;
		if(mpesacode == ""){
			alert("Enter Mpesa Code");
			return false;
		}
		//window.location.href = "batch-install.php?framework="+serial+"&mpesa="+mpesacode;
		$.ajax({
            type: "POST",
            url: "batch-install.php",
            //dataType: "json",
            data: {framework:serial, mpesa:mpesacode},
            success : function(data){
				if(data == "success"){
					//var index = table.row( this ).index();
					//alert(index);
					//document.getElementById("datarow").deleteRow(index);
					
				}
				alert(data);
            }
        });
      };
    };
    currentRow.onclick = createClickHandler(currentRow);
  }
}
window.onload = addRowHandlers();

</script>