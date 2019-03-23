<?php
declare (strict_types = 1);

namespace app\controllers;

use Yii;
use yii\web\Controller;

class NewsController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function dataItems(): array
    {
        $newsList = [
            ['title' => 'First World War', 'date' => '1914-07-28'],
            ['title' => 'Second World War', 'date' => '1939-09-01'],
            ['title' => 'First man on the moon', 'date' => '1969-07-
            20'],
        ];
        return $newsList;
    }

    

    public function actionAdvTest()
    {
        return $this->render('advTest');
    }

    public function actionResponsiveContentTest()
    {
        $responsive = Yii::$app->request->get('responsive', 0);
        if ($responsive) {
            $this->layout = 'responsive';
        } else {
            $this->layout = 'main';
        }
        return $this->render('responsiveContentTest', ['responsive' =>
            $responsive]);
    }

    public function data()
    {
        return [
            ["id" => 1, "date" => "2015-04-19", "category" => "business",
                "title" => "Test news of 2015-04-19"],
            ["id" => 2, "date" => "2015-05-20", "category" => "shopping",
                "title" => "Test news of 2015-05-20"],

            ["id" => 3, "date" => "2015-06-21", "category" => "business",
                "title" => "Test news of 2015-06-21"],
            ["id" => 4, "date" => "2016-04-19", "category" => "shopping",
                "title" => "Test news of 2016-04-19"],

            ["id" => 3, "date" => "2017-05-19", "category" => "business",
                "title" => "Test news of 2017-05-19"],
            ["id" => 4, "date" => "2018-06-19", "category" => "shopping",
                "title" => "Test1"],
        ];
    }

    public function actionItemsList()
    {
        // if missing, value will be null
        $year = Yii::$app->request->get('year');
        // if missing, value will be null
        $category = Yii::$app->request->get('category');
        $data = $this->data();
        $filteredData = [];
        foreach ($data as $d) {
            if (($year != null) &&
                (date('Y', strtotime($d['date'])) == $year)) {
                $filteredData[] = $d;
            }

            if (($category != null) && ($d['category'] == $category)) {
                $filteredData[] = $d;
            }

        }
        return $this->render('itemsList', ['year' => $year, 'category' => $category, 'filteredData' => $filteredData]);
    }

    public function actionInternationalIndex()
    {
// if missing, value will be 'en'
        $lang = Yii::$app->request->get('lang', 'en');
        Yii::$app->language = $lang;
        return $this->render('internationalIndex');
    }

    public function actionItemDetail()
    {
        $title = Yii::$app->request->get('title');
        $data = $this->data();
        $itemFound = null;
        foreach ($data as $d) {
            if ($d['title'] == $title) {
                $itemFound = $d;
            }

        }
        return $this->render('itemDetail', ['title' => $title,
            'itemFound' => $itemFound]);
    }

}
