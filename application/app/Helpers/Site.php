<?php namespace App\Helpers;


class Site
{

    public static function active($path, $class = ' class="active"')
    {
        return \Request::is($path) ? $class : '';
    }
    
    
    
    public static function time2iso8601($time) {
        $units = array(
            "Y" => 365*24*3600,
            "D" =>     24*3600,
            "H" =>        3600,
            "M" =>          60,
            "S" =>           1,
        );

        $str = "P";
        $istime = false;

        foreach ($units as $unitName => &$unit) {
            $quot  = intval($time / $unit);
            $time -= $quot * $unit;
            $unit  = $quot;
            if ($unit > 0) {
                if (!$istime && in_array($unitName, array("H", "M", "S"))) { // There may be a better way to do this
                    $str .= "T";
                    $istime = true;
                }
                $str .= strval($unit) . $unitName;
            }
        }

        return $str;
    }


    public static function show_code($filepath)
    {
        $code = file_get_contents(app_path() ."/".$filepath);
        $code = preg_replace("#{{ Site::show_(.*) }}#Us", '', $code);
        $code = highlight_string($code, TRUE);
        return "<pre>\n" . $code . "\n</pre>";
    }

    public static function show_method($class, $methods)
    {
        $rclass = new \ReflectionClass($class);
        $definition = implode("", array_slice(file($rclass->getFileName()), $rclass->getStartLine()-1, 1));
        

        $code = "\n".$definition."\n....\n\n";

        if (!is_array($methods))
            $methods = array($methods);
 
        foreach ($methods as $method)
        {
            $method = new \ReflectionMethod($class, $method);
            $filename = $method->getFileName();
            $start_line = $method->getStartLine()-1;
            $end_line = $method->getEndLine();
            $length = $end_line - $start_line;
            $source = file($filename);
            $content = implode("", array_slice($source, $start_line, $length));

            $code .= $content."\n\n";
        }
        
        $code = highlight_string("<?php ".$code, TRUE);
        $code = str_replace('&lt;?php&nbsp;', '', $code);
        return "<pre>\n" . $code . "\n</pre>";
    }




}
