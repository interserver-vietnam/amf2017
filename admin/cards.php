<?php
	require_once("include.php");
	$lang = $_COOKIE['lang'];
	$sql = "SELECT * FROM `cards` order by `order` ";
	$result = qury_sel($sql, $conn);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<?php
require_once("meta.php");
?>
<link href="css/jquery.datepick.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.datepick.js"></script>

<script type="text/javascript">

$( document ).ready(function() {
	
	$(".delete").click(function(){
		if(confirm("確認要刪除 "+$(this).closest("tr").find("td:eq(0)").text()+" ?")){
			myDelete( 'cards', 'id', $(this).data("id") );
		}
	});

	
})

</script>
<style type='text/css'>

</style>
</head>

<body>
<div class="wrap"> 
  <!--header start-->
  <?php
	require_once("header.php");
  ?>
  <!--header end--> 
  
  <!--admin_content start-->
  
 <div class="admin_content"><input name="" type="button" value="新增" style="float:right" onclick="location.href='cards_edit.php'" />
    <h2>電子名片</h2>
    <div class="cont_r"> 
     
      <h3>列表</h3>
      <table width="100%" border="1" cellspacing="0" cellpadding="0" id='list_table'>
        <tr>
		<th>姓名</th>
		<th width="100">狀態</th>
        <th width="40">排序</th>
        <th width="40"></th>
        <th width="40"></th>
	</tr>
	<?
	while($data = mysqli_fetch_assoc($result)){	
	$type = $data["show"];
	if($type==0){
		$case = "不顯示"	;
	}else{
		$case = "顯示";
	}
	?>
		<tr>
			<td align="center"><?=$data["name"]?></td>
			<td align="center" style="text-align:center"><?=$case?></td>
            <td align="center" style="text-align:center"><?=$data["order"]?></td>
			<td align="center"><button onclick="location.assign('cards_edit.php?id=<?=$data["id"]?>');">編輯</td>
			<td align="center"><button class="delete" data-id="<?=$data["id"]?>">刪除</td>
		</tr>
	<?
	}
	?>
      </table>
      
    </div>
  </div>
  <!--admin_content end--> 
</div>
<?php
require_once("footer.php"); 
?>
<!--wrap end-->
</body>