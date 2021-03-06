<?php

/**
 * @param array                    $params
 * @param Smarty_Internal_Template $smarty
 *
 * @throws SmartyException
 * @return string
 *
 * @author Kovács Vince
 */
function smarty_function_form_textarea($params, Smarty_Internal_Template &$smarty)
{
    if (!isset($params['_name']))
    {
        throw new SmartyException('Missing _name attribute for form_text tag');
    }
    $name = $params['_name'];

    $value = isset($params['_value'])
        ? $params['_value']
        : (isset($params['_populate'])
            ? \Input::get($name)
            : null);

    unset($params['_name']);
    unset($params['_value']);
    unset($params['_populate']);

    return Form::textarea($name, $value, $params);
}