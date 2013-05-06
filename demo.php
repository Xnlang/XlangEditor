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
  <link rel="stylesheet" href="https://Xnlang.cn/XlangEditor/themes/default/default.css" />
  <link rel="stylesheet" href="https://Xnlang.cn/XlangEditor/plugins/code/prettify.css" />
  <script charset="utf-8" src="https://xnlang.cn/XlangEditor/XlangEditor.js"></script>
  <script charset="utf-8" src="https://Xnlang.cn/XlangEditor/lang/zh_CN.js"></script>
  <script charset="utf-8" src="https://Xnlang.cn/XlangEditor/plugins/code/prettify.js"></script>
  <script>
  <script type='text/javascript'>
		XlangEditor.ready(function(X) {
			var editor1 = X.create('textarea[name="content1"]', {
				cssPath : 'https://Xnlang.cn/XlangEditor/themes/default/prettify.css',
				uploadJson : 'https://Xnlang.cn/XlangEditor/php/upload_json.php',
				fileManagerJson : 'https://Xnlang.cn/XlangEditor/php/file_manager_json.php',
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

