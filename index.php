<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>检测非英文字符</title>
	<script src="common/lib/jquery-3.3.1.js"></script>
	<link rel="stylesheet" href="common/lib/font-awesome-4.7.0/css/font-awesome.min.css">
	<style>
		*{
			font-family: Arial;
		}
		.hightlight{
			color: red;
			background-color: yellow;
		}
		.main-frame{
			margin: 80px auto 50px;
			width: 1000px;
		}
		.data-frame{
			box-sizing:border-box;
			-moz-box-sizing:border-box; /* Firefox */
			-webkit-box-sizing:border-box; /* Safari */
			width:480px;
			height: 300px;
			padding: 15px;
			font-size: 15px;
			border: 1px solid #ccc;
		}
		#btn{
			margin: 10px 0 10px 0;
			width: 80px;
			height: 40px;
			border-radius: 3px;
			border-style: none;
			background-color: steelblue;
			color: white;
			cursor: pointer;
		}
		#message{
			border: 1px solid #ccc;
			margin-left: 40px;
			overflow: auto;
			background-color: #EEF0F2;
			float: left;
		}
		#btn:hover{
			background-color: skyblue;
		}
		.btn-group{
			text-align: right;
		}
		#sdata-form{
			position: relative;
			box-sizing:border-box;
			-moz-box-sizing:border-box; /* Firefox */
			-webkit-box-sizing:border-box; /* Safari */
			width:480px;
			height: 300px;
			float: left;
		}
		.icon-trash{
			position: absolute;
			right: 20px;
			bottom: 10px;
			z-index: 9999;
			cursor: pointer;
			color: #aaa;
			font-size: 25px;
		}
		.icon-trash:hover{
			color: steelblue;
		}
	</style>
</head>
<body>
	<div class="main-frame">
		<header>
			<h1>检测非英文字符</h1>
		</header>
		<div class="main-data-frame">
			<form id="sdata-form">
				<textarea class="data-frame import" name="source" style="resize: none;" placeholder="请输入要检测的文字" autofocus></textarea>
				<i id="clear-btn" class="icon-trash fa fa-trash"></i>
			</form>
			<div id="message" class="data-frame"></div>
			<div style="clear: both;"></div>
		</div>
		<div class="btn-group">
			<button id="btn" type="button">检测</button>
		</div>
		
	</div>
	
</body>
<script>

		$('#clear-btn').click(function(){
			$('.import').val('');
			$('.data-frame').empty();
		});

		$('#btn').click(function(){
			$('.data-frame').empty();
			$.ajax({  
		        url:"checkCode.php",
		        method:"POST",  
		        data:$('#sdata-form').serialize(),
		        success:function(data){ 
		        	$("#message").append(data);
		        },
		        error:function(xhr){
		        	$("#message").append("错误提示： " + xhr.status + " " + xhr.statusText);
		        }
	        });
		});
</script>
</html>