# yii2-widget-extended-highcharts
Extends functionality of [miloschuman\highcharts](https://github.com/miloschuman/yii-highcharts/) widget to provide abillity for costumization empty item presentation
  
Расширяет функционал [miloschuman\highcharts](https://github.com/miloschuman/yii-highcharts/) widget с целью предоставления возможности настройки отображения т.н. "пустого блока"
  
# Extended Highcharts widget allow cosumization of empty item presentation.
Widget будет проверять наличие в массиве 'series' данных и если этот массив пуст - будет выполнено отображения т.н. "пустого блока"

# Установка
Предпочтительный способ установки через [composer](http://getcomposer.org/download/). Ознакомьтесь с требовния расширения и его зависимостями в [composer.json](https://github.com/aayaresko/yii2-widget-extended-highcharts/blob/master/composer.json).

Для установки выполните
```
$ php composer.phar require aayaresko/yii2-widget-extended-highcharts "dev-master"
```
или добавьте
```
"aayaresko/yii2-widget-extended-highcharts": "dev-master"
```
в секцию ```require``` вашего `composer.json`.

## Использование
```php
use aayaresko\highcharts\ExtendedHighcharts;
```
```php
echo ExtendedHighcharts::widget([
    'options' => $options,
    'htmlOptions' => [
        'class' => 'chart-content'
    ],
    'emptyItemText' => Yii::t('app', 'Your search request found no matches.<br/>Try to change the data query and search again.')
]);
```
# Конфигурация
Осуществляется через параметры:
* useEmptyItem - включить использование механизма отображения т.н. "пустого блока"
* emptyItemText - текст, отображаемый в случае, если текущая секция ($options['series'][0]['data']) пуста
* emptyItemHtmlOptions - массив параметров, передаваемых в качестве настроек отображения т.н. "пустого блока", который будет обработан при помощи [renderTagAttributes()], пример:
    * tag - html tag т.н. "пустого блока" (по умолчанию - div);
    * class - html class т.н. "пустого блока" (по умолчанию - empty);

## License
**yii2-widget-extended-highcharts** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.
Для возврата поведения widget
