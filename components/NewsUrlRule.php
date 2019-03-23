<?php
namespace app\components;

use yii\web\UrlRuleInterface;
use  yii\base\BaseObject;

class NewsUrlRule extends BaseObject implements UrlRuleInterface
{

   /*  public function createUrl($manager, $route, $params)
    {
        if ($route === 'news/item-detail') {
            if (isset($params['title'])) {
                return 'news/' . $params['title'];
            }
        }
        return false; // this rule does not apply
    }
    
    public function parseRequest($manager, $request)
    {
        $pathInfo = $request->getPathInfo();
        if (preg_match('%^([^\/]*)\/([^\/]*)$%', $pathInfo, $matches)) {
            if ($matches[1] == 'news') {
                $params = ['title' => $matches[2]];
                return ['news/item-detail', $params];
            } else {
                return false;
            }
        }
        return false; // this rule does not apply
    } */
}
