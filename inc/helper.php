<?php
function venera_get_widgets_count( $sidebar_id ){
  $sidebars_widgets = wp_get_sidebars_widgets();
  if(isset( $sidebars_widgets[ $sidebar_id ] )){
    return (int) count( (array) $sidebars_widgets[ $sidebar_id ] );
  }else{
    return 0;
  }
}

function venera_calc_span_class($columns){
  $span = 12;
  switch($columns){
    case 1:
      $span = 12;
    break;
    case 2:
      $span = 6;
    break;
    case 3:
      $span = 4;
    break;
    case 4:
      $span = 3;
    break;
    case 5:
      $span = 2;
    break;
    case 6:
      $span = 2;
    break;
    case 12:
      $span = 1;
    break;
    default:
      $span = 12;
    break;
  }
  return 'span'.$span;
}