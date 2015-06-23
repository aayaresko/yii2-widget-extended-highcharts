<?php

/**
 * Highcharts class file.
 *
 * @author aayaresko <aayaresko@gmail.com>
 */

namespace aayaresko\highcharts;

use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;

/**
 * Highcharts encapsulates the {@link http://www.highcharts.com/ Highcharts}
 * charting library's Chart object.
 */
class ExtendedHighcharts extends Highcharts
{

    public $useEmptyItem = true;

    public $emptyItemText = 'Your search request found no matches.<br/>Try to change the data query and search again.';

    public $emptyItemHtmlOptions = [
        'class' => 'empty',
        'tag' => 'div',
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
     * print an emptyItem div
     */
    private function renderEmptyWidget()
    {
        if(!isset($this->emptyItemHtmlOptions['tag'])){
            $this->emptyItemHtmlOptions['tag'] = 'div';
        }
        
        $tag = $this->emptyItemHtmlOptions['tag'];
            unset($this->emptyItemHtmlOptions['tag']);

        echo Html::tag($tag, $this->emptyItemText, $this->emptyItemHtmlOptions);
    }
}
