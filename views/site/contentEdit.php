<html>
<head>
    <title>SkyLuxTravel admin area</title>
    <?php
    include ROOT."/views/layouts/links.php"; ?>
</head>
<body>
<div class="panel panel-default">
    <div class="panel-heading">ID of content</div>
    <div class="panel-body">
        <?php echo $contentID; ?>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Content editing</div>
    <div class="panel-body">
        <form class="navbar-form navbar-left" method='POST'>
            <div class="form-group">
        <textarea name="text" class="form-control"
                  placeholder="Enter text"><?php echo html_entity_decode($text); ?></textarea><br>
            </div>
            <input class="btn btn-default" id="" type="submit" name="save" value="Save">
        </form>
    </div>
</div>


</body>
</html>