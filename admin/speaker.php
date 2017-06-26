<?php
	require_once("include.php");	
 	$lang = $_COOKIE['lang'];
	$sql = "SELECT * FROM lecturers where lang=$lang  ORDER BY `order` ,`id` DESC";
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
		if(confirm("確認要刪除 "+$(this).closest("tr").find("td:eq(1)").text()+" ?")){
			myDelete( 'lecturers', 'id', $(this).data("id") );
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
  
  <div class="admin_content"><input name="" type="button" value="新增" style="float:right" onclick="location.href='speaker_edit.php'" />
    <h2>講師清單</h2>
    <div class="cont_r"> 
     
      <h3>講師列表</h3>
      <table width="100%" border="1" cellspacing="0" cellpadding="0" id='list_table'>
        <tr>
        <th width="100">圖片</th>
		<th>姓名</th>
		<th>頭銜</th>
        <th width="55">顯示</th>
        <th width="55">排序</th>
		<th width="55">&nbsp;</th>
		<th width="55">&nbsp;</th>
	</tr>
	<?
	while($data = mysqli_fetch_assoc($result)){
		if($data["show"]==1){
			$showtype="顯示";	
		}else{
			$showtype="不顯示";
		}
	?>
		<tr>
			<td align="center"><img class="speakerlist" src="../pic/lecturers/<?=$data["image"]?>"></td>
			<td align="left"><?=$data["name"]?></td>
            <td align="left"><?=$data["title"]?></td>
            <td align="left"><?=$showtype?></td>
            <td align="left"><?=$data["order"]?></td>
			<td align="center"><button onclick="location.assign('speaker_edit.php?id=<?=$data["id"]?>');">編輯</td>
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
