<?php

echo '<li class="col-sm-3 col-xs-6"><a href="'. esc_url( $item['link'] ) .'" target="_blank"><img src="'. esc_url( $item[$size] ) .'" data-pin-description="'. esc_attr( $item['description'] ) .'" title="The Dream Bed on Instagram"></a></li>';