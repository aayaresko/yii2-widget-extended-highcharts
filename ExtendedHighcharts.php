<?php

/**
 * Highcharts class file.
 *
 * @author aayaresko <aayaresko@gmail.com>
 */

namespace aayaresko\highcharts;

use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use yii\helpers\ArrayHelper;

/**
 * Highcharts encapsulates the {@link http://www.highcharts.com/ Highcharts}
 * shows an emptyItem block if current chart has no data to display
 * charting library's Chart object.
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
