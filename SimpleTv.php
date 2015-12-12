<?php

/**
 * User: Denis Koshechkin
 * Date: 12.12.2015
 * Time: 16:02
 */
namespace HomeMedia;

use \Exception;

/**
 * Просто ящик. Можно включить/выключить, переключать каналы, управлять громкостью.
 *
 * Class SimpleTv
 * @package HomeMedia
 */

class SimpleTv
{
    const PARAMS = [
        'manufacturer' => 'производитель',
        'model' => 'модель',
        'resolutionWidth' => 'разрешение в ширину',
        'resolutionHeight' => 'разрешение в высоту',
        'screenSize' => 'диагональ',
        'aspect' => 'соотношение сторон',
        //'features' => '',
    ];

    const SMART_TV = 1;

    const IS_LED = 2;

    const DIGITAL_CHANNELS = 4;

    const LAN_PORT = 8;

    const WIFI_MODULE = 16;

    const MAX_CHANNELS = 100;

    protected $isEnabled = false;

    protected $model;

    protected $manufacturer;

    protected $channels = [
        1 => 'Первый канал',
        2 => 'Россия матушка',
        3 => 'ТНТ',
    ];

    protected $currentChannel = 0;

    protected $currentVolume = 10;

    protected $maxVolume = 30;

    protected $isMuted = false;

    /**
     * @var string пикселей в ширину
     */
    protected $resolutionWidth;

    /**
     * @var string пикселей в высоту
     */
    protected $resolutionHeight;

    /**
     * @var float диагональ в дюймах
     */
    protected $screenSize;

    /**
     * @var string соотношение сторон
     */
    protected $aspect;

    protected $features;

    /**
     * @param $params array свойства нового ящика по аналогии с массивом PARAMS
     *
     * Пример создания нового телевизора:
     * $myTv = new SimpleTv([
     *      'manufacturer' => 'Sony',
     *      'model' => 'S-100',
     *      'resolutionWidth' => '1920',
     *      'resolutionHeight' => '1080',
     *      'resolutionHeight' => '1080',
     *      'screenSize' => 15.6,
     *      'aspect' => '16:9',
     *      'features' => SimpleTV::IS_LED | SimpleTV::SMART_TV | SimpleTV::LAN_PORT
     * ]);
     *
     * @throws Exception
     */
    function __construct($params) {
        foreach (self::PARAMS as $key => $value) {
            if (empty($params[$key])) {
                throw new Exception('Не указано свойство: ' . $value);
            }
        }

        $this->manufacturer = $params['manufacturer'];
        $this->model = $params['model'];

        $this->resolutionWidth = $params['resolutionWidth'];
        $this->resolutionHeight = $params['resolutionHeight'];
        $this->screenSize = $params['screenSize'];
        $this->aspect = $params['aspect'];

        if (!empty($params['features'])) {
            $this->features = $params['features'];
        }
    }

    function __destruct() {
        echo "Был телевизор, и нет телевизора.";
    }

    /**
     * Возвращает модель телевизора
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Возвращает производителя телевизора
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Включает телевизор
     */
    public function turnOn()
    {
        $this->isEnabled = true;
    }

    /**
     * Выключает телевизор
     */
    public function turnOff()
    {
        $this->isEnabled = false;
    }

    /**
     * Возвращает текущий уровень громкости
     * @return int
     */
    public function getCurrentVolume()
    {
        return $this->currentVolume;
    }

    /**
     * Увеличивает громкость на 1
     */
    public function volumeUp()
    {
        if ($this->currentVolume + 1 <= $this->maxVolume) {
            $this->currentVolume++;
        }
    }

    /**
     * Уменьшает громкость на 1
     */
    public function volumeDown()
    {
        if ($this->currentVolume - 1 <= 0) {
            $this->currentVolume--;
        }
    }

    /**
     * Выключает/ключает звук
     */
    public function switchMute()
    {
        $this->isMuted = !$this->isMuted;
    }

    /**
     * Возвращает текущий канал
     * @return int
     */
    public function getCurrentChannel()
    {
        return $this->currentChannel;
    }

    /**
     * Переключает канал на указанный. Если указанного канала не существует - выводит сообщение для пользователя.
     *
     * @param $channel
     * @throws Exception
     */
    public function setChannel($channel)
    {
        if ($channel >= 0 && $channel < self::MAX_CHANNELS) {
            $this->currentChannel = $channel;
            $this->showChannel($this->currentChannel);
        } else {
            $this->showScreenMessage('Такого канала не существует.');
        }
    }

    /**
     * Переключает канал на предыдущий
     */
    public function prevChannel()
    {
        if ($this->currentChannel - 1 < 0) {
            $this->currentChannel = self::MAX_CHANNELS;
        } else {
            $this->currentChannel--;
        }

        $this->showChannel($this->currentChannel);
    }

    /**
     * Переключает канал на следующий
     */
    public function nextChannel()
    {
        if ($this->currentChannel + 1 > self::MAX_CHANNELS) {
            $this->currentChannel = 0;
        } else {
            $this->currentChannel++;
        }

        $this->showChannel($this->currentChannel);
    }

    /**
     * Выводит служебное сообщение на экран
     *
     * @param $text
     */
    protected function showScreenMessage($text)
    {
        echo $text;
    }

    /**
     * Выводит название канала
     * @param $channel
     */
    protected function showChannel($channel)
    {
        if (!empty($this->channels[$channel])) {
            $this->showScreenMessage($this->channels[$channel]);
        } else {
            $this->showScreenMessage($channel);
        }
    }

    /**
     * Выводит всю информацию о состоянии ящика
     */
    public function watchTv()
    {
        echo "TV manufacturer: " . $this->manufacturer . "\n";
        echo "TV model: " . $this->model . "\n";
        echo "Channel: " . $this->currentChannel. "\n";
        echo "Volume: " . $this->isMuted ? "(muted)" : $this->currentVolume. "\n";
    }

    /**
     * Добавляет канал
     */
    public function addChannel()
    {
        //Наверное пора остановиться
    }

}
