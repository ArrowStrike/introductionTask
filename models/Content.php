<?php

class Content
{
    public static function getContentById($id)
    {
        $result = $GLOBALS['DB']->prepare("SELECT * FROM content WHERE id='{$id}'");
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $contentItem = $result->fetch();

        if (!$contentItem) {
            $contentItem = array(
                'id' => $id,
                'text' => '',
            );
        }

        return $contentItem;
    }

    public static function contentEdit($id)
    {
        if (isset($_POST['save'])) {

            $text = $_POST['text'];
            $text = self::textSecurity($text);

            if ($text === "") {
                $sqlQuery = "DELETE FROM content WHERE id='{$id}'";
            } else {
                if (self::getContentById($id)) {
                    $sqlQuery = "UPDATE content SET text='{$text}' WHERE id='{$id}'";
                } else {
                    $sqlQuery = "INSERT INTO content (id, text) VALUES ('{$id}','{$text}')";
                }
            }

            $result = $GLOBALS['DB']->prepare($sqlQuery);
            $result->execute();

            self::refreshPage();
        }
    }

    public static function getText($id, $defaultValue)
    {
        $content = self::getContentById($id);

        if ($content['text'] === '') {
            $content = array(
                'id' => $id,
                'text' => $defaultValue,
            );
        }

        echo html_entity_decode($content['text']);

        self::ifAdminAddButton($content['id']);
    }

    public static function textSecurity($text)
    {
        $text = trim($text);
        $text = addslashes($text);
        $text = htmlspecialchars($text);
        $text = htmlentities($text);

        return $text;
    }

    public static function refreshPage()
    {
        echo "<script>
         window.close();
         window.opener.location.reload();
        </script>";
    }

    public static function ifAdminAddButton($contentID)
    {
        if (isset($_GET['admin'])) {
            ?>
            <a href="index.php?editID=<?php echo $contentID; ?>"
               target="_blank"
               onClick="popupWin = window.open(this.href, 'newWindow', 'location, width=700, height=400');
                                           popupWin.focus();
                                           return false;">
                <span class="glyphicon glyphicon-edit"></span>
            </a>
        <?php }
    }
}