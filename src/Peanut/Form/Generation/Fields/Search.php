<?php declare(strict_types=1);

namespace Peanut\Form\Generation\Fields;

class Search extends \Peanut\Form\Generation\Fields
{
    public static function write($key, $property, $value)
    {
        $value = \htmlspecialchars((string) $value);

        if (0 === \strlen($value) && true === isset($property['default'])) {
            $value = \htmlspecialchars((string) $property['default']);
        }
        $class = $property['class'] ?? '';
        $html = <<<EOT
        <input type="text" class="form-control btn-search {$class}" readonly="readonly" value="{$value}" />
        <input type="hidden" class="form-control" name="{$key}" value="{$value}" />
        <span class="input-group-btn"><button class="btn btn-primary btn-search {$class}" type="button"><span class="glyphicon glyphicon-search"></span></button></span>
EOT;

        return $html;
    }

    public static function read($key, $property, $value)
    {
        $value = (string) $value;
        $html  = <<<EOT
        {$value}

EOT;

        return $html;
    }
}
