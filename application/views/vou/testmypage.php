<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; user-scalable=0;" />
    <title>My HTML</title>
</head>
<body>

<input type="button" value="Say hello" onClick="showAndroidToast('Hello Android!')" />
<input type="button" value="Open Dialog" onClick="openAndroidDialog()" />
<br/>
<p>Call Java method Without @JavascriptInterface</p>
<input type="button" value="Say hello" onClick="showAndroidToast2('Hello Android!')" />
<br/>
<p>Call Java method not public</p>
<input type="button" value="Open Dialog" onClick="openAndroidDialog2()" />
<br/>
<script language="javascript">
 function showAndroidToast(toast) {
  AndroidFunction.showToast(toast);
 }

 function openAndroidDialog() {
  AndroidFunction.openAndroidDialog();
 }

 function showAndroidToast2(toast) {
  AndroidFunction.showToast2(toast);
 }

 function openAndroidDialog2() {
  AndroidFunction.openAndroidDialog2();
 }

   function callFromActivity(msg){
    document.getElementById("mytext").innerHTML = msg;
   }
</script>

</body>
</html>