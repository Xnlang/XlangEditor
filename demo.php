<?php
  $htmlData = '';
	if (!empty($_POST['content1'])) {
		if (get_magic_quotes_gpc()) {
			$htmlData = stripslashes($_POST['content1']);
		} else {
			$htmlData = $_POST['content1'];
		}
	}
?>
<html>
<head>
	<meta charset="utf-8" />
	<title>XlangEditor PHP</title>
	<link rel="stylesheet" href="https://github.com/Xnlang/XlangEditor/blob/master/default.css" />
	<link rel="stylesheet" href="https://github.com/Xnlang/XlangEditor/blob/master/prettify.css" />
	<script charset="utf-8" src="https://github.com/Xnlang/XlangEditor/blob/master/XlangEditor.js"></script>
	<script charset="utf-8" src="https://github.com/Xnlang/XlangEditor/blob/master/zh_CN.js"></script>
	<script charset="utf-8" src="https://github.com/Xnlang/XlangEditor/blob/master/prettify.js"></script>
	<script>
		XlangEditor.ready(function(X){
			var editor1 = X.create('textarea[name="content1"]', {
				cssPath : 'https://github.com/Xnlang/XlangEditor/blob/master/prettify.css',
				uploadJson : 'https://github.com/Xnlang/XlangEditor/blob/master/upload_json.php',
				fileManagerJson : 'https://github.com/Xnlang/XlangEditor/blob/master/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					X.ctrl(document, 13, function() {
						self.sync();
						X('form[name=example]')[0].submit();
					});
					X.ctrl(self.edit.doc, 13, function() {
						self.sync();
						X('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>
</head>
<body>
	<?php echo $htmlData; ?>
	<form name="example" method="post" action="demo.php">
		<textarea name="content1" style="width:700px;height:200px;visibility:hidden;"><?php echo htmlspecialchars($htmlData); ?></textarea>
		<br />
		<input type="submit" name="button" value="提交内容" /> (提交快捷键: Ctrl + Enter)
	</form>
</body>
</html>

