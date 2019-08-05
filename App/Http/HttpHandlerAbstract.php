<?php

namespace App\Http;


use Core\Template;

class HttpHandlerAbstract
{
    
    /**
     * @var Template
     */
    protected $template;

    public function __construct(Template $template)
    {
        $this->template = $template;
    }

    public function Render(string $templateName, array $data = null)
    {
        $this->template->Render($templateName, $data);
    }

    public function Redirect(string $url)
    {
        header("Location: $url");
    }
}