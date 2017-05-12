<?php

class SiteController
{
    public static function actionIndex()
    {
        if (isset($_GET['id'])) {
            self::actionContentEdit($_GET['id']);
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
