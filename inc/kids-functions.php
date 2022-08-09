<?php

    function kids_theme_the_content(){
        $out .= '<div class="content-section">';

        $out .= '<div class="container">';

        $out .= get_the_content(); 

        $out .= '</div></div>';
        
        return $out;
    }
    