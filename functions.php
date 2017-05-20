<?php

function render($template, $tag_name, $data)
{
    $start_pos = strpos($template, "#" . $tag_name . "#");
    $end_pos = strpos($template, "#/" . $tag_name . "#");
    $tag = substr($template, $start_pos + strlen("#" . $tag_name . "#"), $end_pos - $start_pos - strlen("#" . $tag_name . "#"));

    $tag2 = "";
    foreach ($data as $key => $item) {
        $tag1 = $tag;
        $tag1 = str_replace("{{key}}", $key, $tag1);
        foreach ($item as $item_key => $item_value) {
            $tag1 = str_replace("{{" . $item_key . "}}", $item_value, $tag1);
        }
        $tag2 = $tag2 . $tag1;
    }

    $template = substr($template, 0, $start_pos) . $tag2 . substr($template, $end_pos + strlen("#/" . $tag_name . "#"));

    return $template;

}



