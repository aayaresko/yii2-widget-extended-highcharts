<?php
/**
 * Created by PhpStorm.
 * User: aayaresko
 * Date: 23.06.15
 * Time: 11:45
 * 
 * Highcharts class file.
 *
 * @copyright Copyright &copy; Andrej Jaresko, disbalans.net, 2015
 * @subpackage yii2-widget-extended-highcharts
 */

namespace aayaresko\highcharts;

use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use yii\helpers\ArrayHelper;

/**
 * Highcharts encapsulates the {@link http://www.highcharts.com/ Highcharts} charting library's Chart object
 * отображает пустой блок в случае если у текущего chart нет данных для отображения.
 * 
 * Class ExtendedHighcharts
 * @author aayaresko <aayaresko@gmail.com>
 * @see http://www.highcharts.com/
 * @see https://github.com/miloschuman/yii2-highcharts
 */
class ExtendedHighcharts extends Highcharts
{

    public $useEmptyItem = true;

    public $emptyItemText = 'Your search request found no matches.<br/>Try to change the data query and search again.';

    public $emptyItemHtmlOptions = [
        'class' => 'empty',
    ];

    /**
     * Renders the widget.
     */
    public function run()
    {
        if($this->useEmptyItem && empty($this->options['series'][0]['data'])) {
            return $this->renderEmptyWidget();
        } else {
            parent::run();
        }
    }

    /**
     * print an emptyItem block
     */
    private function renderEmptyWidget()
    {
        $tag = ArrayHelper::remove($this->emptyItemHtmlOptions, 'tag', 'div');
        echo Html::tag($tag, $this->emptyItemText, $this->emptyItemHtmlOptions);
    }
}
