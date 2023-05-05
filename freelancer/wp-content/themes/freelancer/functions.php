<?php add_theme_support('widgets');

register_sidebar([
    'id' => 'crm-sidebar',
    'name' => 'CRM Sidebar',
    'before_widget'  => '<div id="%1$s" class="widget %2$s">',
    'after_widget'   => "</div>\n",
]);