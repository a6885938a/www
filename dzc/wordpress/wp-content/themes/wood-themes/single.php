

<?php
if ( in_category('company-news') ) {
include(TEMPLATEPATH . '/single-company-news.php');
}

elseif ( in_category('company-news1') ) { // plugin 为category的别名
include(TEMPLATEPATH . 'single-company-news.php');
}

elseif ( in_category('company-news2') ) { // plugin 为category的别名
include(TEMPLATEPATH . 'single-company-news.php');
}


elseif ( in_category('company-news3') ) { // plugin 为category的别名
include(TEMPLATEPATH . 'single-company-news.php');
}

elseif ( in_category('company-news4') ) { // plugin 为category的别名
include(TEMPLATEPATH . 'single-company-news.php');
}

elseif ( in_category('company-news5') ) { // plugin 为category的别名
include(TEMPLATEPATH . 'single-company-news.php');
}

elseif ( in_category('company-news6') ) { // plugin 为category的别名
include(TEMPLATEPATH . 'single-company-news.php');
}

elseif ( in_category('company-news7') ) { // plugin 为category的别名
include(TEMPLATEPATH . 'single-company-news.php');
}

elseif ( in_category('company-news8') ) { // plugin 为category的别名
include(TEMPLATEPATH . 'single-company-news.php');
}


elseif ( in_category('company-news9') ) { // plugin 为category的别名
include(TEMPLATEPATH . 'single-company-news.php');
}

elseif ( in_category('company-news10') ) { // plugin 为category的别名
include(TEMPLATEPATH . 'single-company-news.php');
}

else {
include(TEMPLATEPATH . '/single-all.php');
}
?>