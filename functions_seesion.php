<?php

function process_template($input)
{
    $output = "";
    $count = 0;
    for ($i=0; $i<strlen($input); $i++) {
        $s = substr($input, $i, 1);
        if ($s == "{") {
            $count++;
        }
        if ($s == "}") {
            $count--;
        }
        if ($count == 2) {
            if ($s != " ") {
                $output .= $s;
            }    
        } else {
            $output .= $s;
        }
    }
    return $output;
}

function show_tag($input, $tag_name)
{
    while (strpos($input,  "<" . $tag_name . ">")) {
        $start_pos = strpos($input, "<" . $tag_name . ">");
        $end_pos = strpos($input, "</" . $tag_name . ">");
        $output = substr($input, 0, $start_pos);
        $output .= substr($input, $start_pos + strlen("<" . $tag_name . ">"), $end_pos - $start_pos - strlen("<" . $tag_name . ">"));
        $output .= substr($input, $end_pos + strlen("</" . $tag_name . ">"));
        $input = $output;
    }    
    return $input;
}

function hide_tag($input, $tag_name)
{
    while (strpos($input,  "<" . $tag_name . ">")) {
        $start_pos = strpos($input, "<" . $tag_name . ">");
        $end_pos = strpos($input, "</" . $tag_name . ">");
        $input = substr($input, 0, $start_pos) . substr($input, $end_pos + strlen("</" . $tag_name . ">"));
    }    
    return $input;
}

function render($template, $tag_name, $data)
{
    $start_pos = strpos($template, "<" . $tag_name . ">");
    $end_pos = strpos($template, "</" . $tag_name . ">");
    $tag = substr($template, $start_pos + strlen("<" . $tag_name . ">"), $end_pos - $start_pos - strlen("<" . $tag_name . ">"));

    $tag2 = "";
    foreach ($data as $key => $item) {
        $tag1 = $tag;
        $tag1 = str_replace("{{key}}", $key, $tag1);
        foreach ($item as $item_key => $item_value) {
            $tag1 = str_replace("{{" . $item_key . "}}", $item_value, $tag1);
        }
        $tag2 = $tag2 . $tag1;
    }

    $template = substr($template, 0, $start_pos) . $tag2 . substr($template, $end_pos + strlen("</" . $tag_name . ">"));

    return $template;

}



