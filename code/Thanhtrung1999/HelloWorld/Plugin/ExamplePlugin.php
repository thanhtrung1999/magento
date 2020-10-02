<?php

namespace Thanhtrung1999\HelloWorld\Plugin;

class ExamplePlugin{
    public function beforeSetTitle(\Thanhtrung1999\HelloWorld\Controller\Index\Example $subject, $title)
    {
        $title = $title . " to ";
        echo __METHOD__ . "</br>";

        return [$title];
    }

    public function afterGetTitle(\Thanhtrung1999\HelloWorld\Controller\Index\Example $subject, $result)
    {

        echo __METHOD__ . "</br>";

        return '<h1>'. $result . 'Tigren.com' .'</h1>';
    }

    public function aroundGetTitle(\Thanhtrung1999\HelloWorld\Controller\Index\Example $subject, callable $proceed)
    {

        echo __METHOD__ . " - Before proceed() </br>";
        $result = $proceed();
        echo __METHOD__ . " - After proceed() </br>";

        return $result;
    }
}
