<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$id?></title>
	<!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    
    <!--   Core JS Files   -->
    <script src="http://localhost/auto_comment_fb/template/assets/js/jquery-1.10.2.js" type="text/javascript"></script>

</head>
<body>
	<div align="center">
		<p align="center">
			<img src="https://graph.facebook.com/<?=$id?>/picture?width=800" alt="" style="width: 100px;height: 100px;"><br>
			คำเตือน : ขณะโปรแกรมทำงานให้เปิดหน้าต่างนี้ทิ้งไว้<br>
			หากปิดหน้าต่างโปรแกรมจะหยุดการทำงานโดยทันที
		</p>
		<hr>
		<p align="center">
			<i class="fa fa-spinner fa-spin" style="font-size: 100px;"></i><br><br>
			โปรแกรมกำลังทำงาน...<br>
		</p>

	</div>

	<?php 
		$list_idpost = array();
		foreach ($feeds_post->result_array() as $key => $value) array_push($list_idpost, $value['post_fbid']);
	?>
	<script type="text/javascript">
		var idpost = [<?='"'.implode('","', $list_idpost).'"'?>];
		var max = idpost.length;
		var i = 1;
		$(document).ready(function() {
			action(i);
		});

		function action(n) {

			var url = 'https://graph.facebook.com/<?=$id?>_'+idpost[n]+'/?fields=comments.order(reverse_chronological)&limit=1&access_token=<?=$access_token?>';
			console.log(url);
			$.getJSON(url, senddata)
			.success(function() {})
			.error(function(event, jqxhr, exception) {
				if(idpost[i+1] === undefined) action(0);
				else action(i+1);
			    return true;
			})
			.complete(function() {  });
			
		}

		function senddata(result) {
			if(result['comments'] == null) {
				console.log('ไม่มีเม้ต์'+idpost[i]);
				action(i++);
				return;
			}
			var url = '<?=base_url()?>work/ask/<?=$id?>/'+result['comments']['data'][0]['id']+'/'+encodeURIComponent(result['comments']['data'][0]['message'])+'/<?=$access_token?>';
			$.getJSON(url, endloop)
			.success(function() {})
			.error(function(event, jqxhr, exception) {
				
				if(idpost[i+1] === undefined) action(0);
				else action(i+1);
			    return true;
			})
			.complete(function() {  });
			return true;
		}

		function endloop(result) {

			//console.log(max+'|'+i);
			if(i >= max) i = 0;
			
			setTimeout(function () {
				console.log('============');
				action(i++);
			},5000);
			return

		}
	</script>
</body>
</html>