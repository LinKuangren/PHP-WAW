<?php

namespace Plugo\Controller;

use Plugo\Services\EscapeVar\EscapeVar;

abstract class AbstractController {

    function renderView(string $template, array $data = [], $htmlspecialchars = true): string {
        if($htmlspecialchars == true){
            $ev = new EscapeVar();
            $data = $ev->secure_template($data);
        }
        $templatePath = dirname(__DIR__, 2) . '/template/' . $template;
        return require_once dirname(__DIR__, 2) . '/template/layout.php';
    }

    protected function redirectToRoute(string $name, array $params = [], $htmlspecialchars = true): void {
        $uri = $_SERVER['SCRIPT_NAME'] . "?page=" . $name;
        if(!empty($params)){
            if($htmlspecialchars == true){
                $ev = new EscapeVar();
                $params = $ev->secure_template($params);
            }
            $strParams = [];
            foreach($params as $key => $val){
                array_push($strParams, urlencode((string) $key) . '=' . urlencode((string) $val));
            }
            $uri .= '&' . implode('&', $strParams);
        }
        header("Location: " . $uri);
        die;
    }

}