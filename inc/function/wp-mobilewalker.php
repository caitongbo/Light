<?php
class Description_Walker extends Walker_Nav_Menu {


    function start_lvl( &$output, $depth = 0, $args = array() ) {
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth); // because it counts the first submenu as 0
        $classes = array('uk-nav uk-navbar-dropdown-nav');
        $class_names = implode( ' ', $classes );
        $add_markup = "<div class='uk-navbar-dropdown'>
                       <div class=\"uk-navbar-dropdown-grid uk-child-width-1-1\" uk-grid>
                       <div>
        ";

        // build html
        $output .= "\n" . $indent . $add_markup . '<ul class="' . $class_names . '">' . "\n";

    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $classes     = empty ( $item->classes ) ? array () : (array) $item->classes;
        $immediateCls   =   "commonClsFirst";
        $class_names = join(
            ' '
            ,   apply_filters(
                'nav_menu_css_class'
                ,   array_filter( $classes ), $item
            )
        );
        if(@$args->has_children){
            $downarrow  =   '';
        }
        if(@$args->has_children && $depth > 0){
            $immediateCls   =   "commonClsFirst downLevelAfter";
        }
        if (@$args->has_children && $depth == 0){
            ! empty ( $class_names )
            and $class_names = ' class="'. esc_attr( $class_names ) . ' has_children"';
        }
        else{
            ! empty ( $class_names )
            and $class_names = ' class="'. esc_attr( $class_names ) . '"';
        }
        // $menuId   = $args->menu->term_id;
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        $output .= "<li>" ;
        $attributes  = '';

        ! empty( $item->attr_title )
        and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
        and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
        and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
        and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

        // insert description for top level elements only
        // you may change this
        $description = ( ! empty ( $item->description ) and 0 == $depth )
            ? '<span class="desc">' . esc_attr( $item->description ) . '</span>' : '';

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        if ( $depth == 0 ) {//top level items
            $item_output = @$args->before
                . "<a $attributes>"
                . @$args->link_before
                . $title
                . '</a>'
                . @$args->link_after
                . @$downarrow
                . @$description
                . @$args->after;
        }else{//everything else
            $item_output = $args->before
                . "<a $attributes>"
                . @$args->link_before
                . $title
                . '</a> '
                . @$args->link_after
                . @$downarrow
                . @$args->after;
        }
        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el'
            ,   $item_output
            ,   $item
            ,   $depth
            ,   $args
            , $id
        );

    }

// Displays end of a level. E.g '</ul>'
// @see Walker::end_lvl()
    function end_lvl(&$output, $depth=0, $args=array()) {
        $display_depth = ( $depth); // because it counts the first submenu as 0
        $add_markup = "</div></div></div>";
        $output .= "</ul>\n".$add_markup."\n";
    }

    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        //v($element);
        if ( !$element )
            return;

        $id_field = $this->db_fields['id'];

        //display this element
        if ( is_array( $args[0] ) )
            $args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
        else if ( is_object( $args[0] ) )
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        $cb_args = array_merge( array(&$output, $element, $depth), $args);
        call_user_func_array(array(&$this, 'start_el'), $cb_args);

        $id = $element->$id_field;

        // descend only when the depth is right and there are childrens for this element
        if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

            foreach( $children_elements[ $id ] as $child ){

                if ( !isset($newlevel) ) {
                    $newlevel = true;
                    //start the child delimiter
                    $cb_args = array_merge( array(&$output, $depth), $args);
                    call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
                }
                $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
            }
            unset( $children_elements[ $id ] );
        }

        if ( isset($newlevel) && $newlevel ){
            //end the child delimiter
            $cb_args = array_merge( array(&$output, $depth), $args);
            call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
        }

        //end this element
        $cb_args = array_merge( array(&$output, $element, $depth), $args);
        call_user_func_array(array(&$this, 'end_el'), $cb_args);

    }
}