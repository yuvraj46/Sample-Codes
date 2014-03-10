//Toggle buton for switching the results obtained from MySQL database in PHP

<?php

	$connect = mysql_connect("localhost","",""); 
	mysql_select_db("test",$connect); 

	$query = "SELECT  `` ,``, SUM(``) AS A
				FROM
				GROUP BY  `` 
				ORDER BY A DESC ";

	$result= mysql_query($query);
	echo "<table border='1' >";
    	echo "<th><td>Candidate First Name</td><td>Amount collected</td></th>";
	$i=0;
	while($row = mysql_fetch_array( $result )) {
				
		$id=$row[''];	
	
		$query1 = "SELECT  `` ,  `` FROM  `` WHERE `id`='$id'";

		$result1= mysql_query($query1);
		$row1 = mysql_fetch_array( $result1 );
		

		$first_grp[$i] = "<tr><td>".
					 "<a href='#' onclick=\"toggleItem('myTbody[$i]');\">". $row[''] ."</a></td><td>". $row['A'] ."</td>".
					 "</tr><tr><td><table border=1 id='myTbody[$i]' style='display: none;'><tr><td>".$row1['city']."</td>".
					 "<td>".$row1['']."</td></tr></table>";
		$i++;
	} 
	 mysql_close();
		
	?>
<html>
<head>
    <title>Test Document - Collapsible Rows</title>
    <script language="javascript">
        function setupTables() {
            var tables = document.getElementsByTagName('table');
            for (var tableLoop=0; tableLoop<tables.length; tableLoop++) {
                if (tables[tableLoop].className == 'collapseColumns') {
                    var headerRow = tables[tableLoop].tHead.rows[0].cells;
                    for (var cellLoop=0; cellLoop<headerRow.length; cellLoop++) {
                        headerRow[cellLoop].onclick = toggleColumn;
                        headerRow[cellLoop].style.cursor = 'pointer';
                    }
                }
            }
        }

        function toggleColumn() {
            var table = this.parentNode.parentNode.parentNode;
            var columnNumber = this.cellIndex;
            var isShowing = (table.tBodies[0].rows[0].cells[columnNumber].style.visibility == 'visible');

            var rows = table.tBodies[0].rows;
            for (var rowLoop=0; rowLoop<rows.length; rowLoop++) {
                rows[rowLoop].cells[columnNumber].style.visibility = isShowing ? 'hidden' : 'visible';
            }
        }

	    function getItem(id) {
	        var itm = false;
	        if(document.getElementById)
	            itm = document.getElementById(id);
	        else if(document.all)
	            itm = document.all[id];
	        else if(document.layers)
	            itm = document.layers[id];
	        return itm;
	    }
	
	    function toggleItem(id) {
	        itm = getItem(id);
	        if(!itm)
	            return false;
	        if(itm.style.display == 'none')
	            itm.style.display = '';
	        else
	            itm.style.display = 'none';
	        return false;
	    }

		function poorman_toggle(id) {
			var tr = document.getElementById(id);
			if (tr==null) { return; }
			var bExpand = tr.style.display == '';
			tr.style.display = (bExpand ? 'none' : '');
		}
		
		function poorman_changeimage(id, sMinus, sPlus) {
			var img = document.getElementById(id);
			if (img!=null)
			{
			    var bExpand = img.src.indexOf(sPlus) >= 0;
				if (!bExpand)
					img.src = sPlus;
				else
					img.src = sMinus;
			}
		}
		
		function Toggle_trGrpHeader2() {
		    poorman_changeimage('trGrpHeader2_Img', 'images/minus.gif', 'images/plus.gif');
		    poorman_toggle('row1');
		    poorman_toggle('row2');
		    poorman_toggle('row3');
		}
		
		function Toggle_trGrpHeader1() {
		    poorman_changeimage('trGrpHeader1_Img', 'images/minus.gif', 'images/plus.gif');
		    poorman_toggle('trRow1');
		}
    </script>

    <style type="text/css">
        table.collapseColumns td {
            visibility: hidden;
        }
    </style>
</head>

<body onload="setupTables();">
<FORM name=me ACTION=<?php echo $_SERVER['PHP_SELF']; ?> METHOD='POST'>
<!!FORM name=me METHOD='POST'>
<table border=2>
	<tr>
	<td>
	<table width="400">
			<?php $j=0; 
				while($j<$i)
				{
					echo $first_grp[$j]; 
					$j++;
				}
			?>
	</table>
	</td>
	
    </tr>
    
    </table>
    </td>
    </tr>
</table>   
</form>
</body>
</html>
