<?php

class Content
{
    public static function getContentById($id)
    {
        $result = $GLOBALS['DB']->prepare("SELECT * FROM content WHERE id="."'$id'");
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $contentItem = $result->fetch();

        return $contentItem;
    }

    public static function contentEdit($id)
    {
        if (isset($_POST['save'])) {

            $text = $_POST['text'];
            $text = trim($text);
            $text = addslashes($text);
            $text = htmlspecialchars($text);
            $text = htmlentities($text);

            $sql = "UPDATE content SET text='".$text."' WHERE id='$id'";

            $result = $GLOBALS['DB']->prepare($sql);
            $result->execute();

            self::refreshPage();
        }
    }

    public static function getText($id, $defaultValue)
    {
        $content = self::getContentById($id);

        if (empty($content['text'])) {
            $content['text'] = $defaultValue;
        }

        echo html_entity_decode($content['text']);

        self::ifAdmin($content['id']);
    }

    public static function refreshPage()
    {
        echo "<script>
         window.close();
         window.opener.location.reload();
        </script>";
    }

    public static function ifAdmin($contentID)
    {
        if (isset($_GET['admin'])) {
            ?>
            <a href="index.php?id=<?php echo $contentID; ?>"
               target="_blank"
               onClick="popupWin = window.open(this.href, 'newWindow', 'location, width=400, height=300');
                                           popupWin.focus();
                                           return false;">
                <img src="/public/media/images/edit-button.png">
            </a>
        <?php }
    }
}