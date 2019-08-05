<?php

namespace Core;


class Template
{
    const TEMPLATE_DIRECTORY = "/App/Templates/";
    const TEMPLATE_EXTENSION = ".php";

    public function Render(string $templateName, $data = [])
    {
        $required = self::TEMPLATE_DIRECTORY . $templateName . self::TEMPLATE_EXTENSION;
        require_once "./" . $required;
    }
}