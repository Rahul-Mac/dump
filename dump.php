<?php
function isJSON($var)
{
    if(!is_string($var))
    {
        return false;
    }
    json_decode($var);
    return json_last_error() === JSON_ERROR_NONE;
} 

function isSerialized($var)
{
    return (($var == 'b:0;' || @unserialize($var) !== false) && !is_bool($var));
}

function dump()
{
    foreach(func_get_args() as $i => $var)
    {
        switch(true)
        {
            case is_array($var):
            case is_object($var):
                echo '<pre>';
                print_r($var);
                echo '</pre>';
                break;

            case isJSON($var):
                echo '<pre>' . json_encode(json_decode($var), JSON_PRETTY_PRINT) . '</pre>';
                break;

            case isSerialized($var):
                echo '<pre>';
                var_dump(unserialize($var));
                echo '</pre>';
                break;

            case is_bool($var):
                $var = $var ? 'true' : 'false';

            default:
                echo '<pre>' . $var . '</pre>';
                break; 
        }
    }
}
?>