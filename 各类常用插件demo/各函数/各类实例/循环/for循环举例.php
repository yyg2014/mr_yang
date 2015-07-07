<?php
	//使用for循环输出1-100的数字
	/*for($i=1;$i<=100;$i++){
		echo $i."&nbsp;";
	}*/
	
	//使用for循环输出一个10行10列的表格
	/*echo "<table>";
	echo "<tr>";
	echo "<td>1</td>";
	echo "<td>2</td>";
	echo "<td>3</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>4</td>";
	echo "<td>5</td>";
	echo "<td>6</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>7</td>";
	echo "<td>8</td>";
	echo "<td>9</td>";
	echo "</tr>";
	echo "</table>";*/
	
	echo "<table border='1' width='300px'>";
	//循环输出3对tr
	for($i=1;$i<=10;$i++){
		if($i%2==0){//行号是偶数行
			echo "<tr bgcolor='#cccccc'>";
		}else{
			echo "<tr>";
		}
		//每循环输出一对tr，都会循环输出3对td
		for($j=1;$j<=10;$j++){
			echo "<td>";
			echo ($i-1)*10+$j;
			echo "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	
	
	
	
	
	