<?php


class Pure_One_Page extends Pure {

	public static function init() {
		
		register_nav_menu( "pure_one_page", "Acid One-Page Contents");

	}

	/**
	 * Filter Menu items (let only actual pages through)
	 * @param  (object) $item
	 * @return (str) Page ID or NULL
	 */
	public static function page_filter($item){
		if ( ( isset( $item->object )  && $item->object == "page" ) ) {
			return $item->object_id;
		}
        return null;
    }

    /**
     * Get the "Page Menu"
     * @param  Which Menu to get ? $location
     * @return ARRAY_A
     */
    public static function page_get_menu($location = false){

        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $location ] ) )
            $menu = wp_get_nav_menu_object( $locations[ $location ] );

        return $menu;
    }

    /**
     * Get the Page Menu items
     * @param  boolean $location
     * @return [type]
     */
    public static function page_get_menu_items($location = false){

        $menu = self::page_get_menu($location);

        if( !empty($menu) && !is_wp_error($menu) ){
            // Get menu items ( List of pages );
            $menu_items = wp_get_nav_menu_items($menu->term_id);
			$menu_items =   array_values(  // Fix the index
                               array_diff(  // Remove null values
                                    // Filter Pages with self::page_filter()
									array_map( array( __CLASS__, "page_filter") , $menu_items ) 
								, array(null) // array_diff()
								)
				            );

            return $menu_items;
        } 
        return false;
    }
}