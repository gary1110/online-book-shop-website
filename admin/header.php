<?php
    
    

    if(isset($_GET['type'])){
        $active = $_GET['type'];
    }else{
        
        $active = "index";
    }
   
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <title></title>
        <script src="js/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/css.css"/>
        <link rel="stylesheet" href="layui/css/layui.css"  media="all">
		<link rel="stylesheet" href="https://at.alicdn.com/t/font_1879862_oru7uh5wqm.css">
		<!-- <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
		
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
		
		
		
        
	</head>
	<body>
		<div class="cm-header-bg">
			<div class="cm-header">
				<div class="col-1" style="line-height:74px;padding-left:50px;font-weight:bold;color:white;font-size:28px">ADMINER</div>
				<div class="col-2">
					<div class="b1"><?php echo $name;?></div>	
					<div class="b2" style='cursor:pointer' onclick="javascript:window.location.href='./logout.php'">Logout</div>
				</div>
			</div>
		</div>
		<div class="cm-main-bg">
			<div class="cm-main">
				<div class="cm-left">
					<div class="menu">
						

						<a href="index.php?type=index" class="item <?php if($active=='index'){echo "active";}?>">Home</a>
							<a href="user.php?type=user" class="item <?php if($active=='user'){echo "active";}?>">Cutomer</a>
						<a href="book.php?type=book" class="item <?php if($active=='book'){echo "active";}?>">Book</a>
						<a href="order.php?type=order" class="item <?php if($active=='order'){echo "active";}?>">Orders</a>
						
					</div>
				</div>