<?php

class SiteController
{
    public static function actionIndex()
    {
        if (isset($_GET['editID'])) {
            self::actionContentEdit($_GET['editID']);
            return true;
        }
        require_once(ROOT.'/views/site/index.php');
    }

    public static function actionContentEdit($contentID)
    {
        Content::contentEdit($contentID);
        $contentItem = Content::getContentById($contentID);
        require_once(ROOT.'/views/site/contentEdit.php');
    }
}
