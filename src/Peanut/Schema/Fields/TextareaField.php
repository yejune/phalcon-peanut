<?php
namespace Peanut\Schema\Fields;

class TextareaField extends \Peanut\Schema\Fields
{
    public function fetch()
    {
        $label    = $this->getLabel();
        $name     = $this->getName();
        $value    = $this->getValue();
        $id       = $this->getId();
        $required = $this->getRequired();

        $input = '';
        if (isset($this->schema->size)) {
            $input .= $this->textarea('text', $name, rtrim($id, '[]'), $value, $required, true);
        } else {
            $input = $this->textarea('text', $name, $id, $value, $required, false);
        }

        return sprintf($this->getStringHtml($label), $label, $input);
    }
}
