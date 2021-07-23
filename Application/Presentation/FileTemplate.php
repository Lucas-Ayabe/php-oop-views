<?php

namespace Application\Presentation;

use Application\Presentation\Contracts\ITemplate;
use InvalidArgumentException;

class FileTemplate implements ITemplate
{
    protected string $templatePath = '';
    protected array $data;

    public function __construct(string $path)
    {
        if (!file_exists($path)) {
            $error = "Template in $path not found.";
            throw new InvalidArgumentException($error);
        }

        $this->templatePath = $path;
    }

    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function render(array $data = []): string
    {
        if (!empty($data)) {
            $this->setData($data);
        }

        ob_start();
        extract($this->data);
        include $this->templatePath;
        $page = ob_get_contents();
        ob_end_clean();

        return $page;
    }

    public function print(array $data = []): void
    {
        echo $this->render($data);
    }
}
