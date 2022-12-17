<?php

namespace Plugo\Services\FlashMessage;

class FlashMessage {

    public function generateFlashMessage(string $name, string $type, string $message) {
        if(isset($_SESSION['FLASH'][$name])){
            unsset($_SESSION['FLASH'][$name]);
        }

        $_SESSION['FLASH'][$name] = [
                                        'message' => $message,
                                        'type' => $type 
                                    ];
    }

    public function clearFlashMessage() {
        $_SESSION['FLASH'] = [];
    }

}