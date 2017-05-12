<html>
<head>
    <title>SkyLuxTravel admin area</title>
</head>
<body>
<div>
    ID of content: <?php echo $contentID ?><br><br>
    Content:
</div>
<form method='POST'>
    <textarea name="text" class="form__control"
              placeholder="Enter text"><?php echo html_entity_decode($contentItem['text']); ?></textarea><br>
    <input class="submit" id="" type="submit" name="save" value="Save">
</form>

</body>
</html>