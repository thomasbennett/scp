<?php

$general_fields = array(
	Carbon_Field::factory('separator', 'general', 'General'),
	Carbon_Field::factory('rich_text', 'better_footer_contact', 'Footer contact text')
		->help_text('Sits in the lower right bottom corner of the footer.'),
	Carbon_Field::factory('text', 'better_copyright', 'Copyright text')
		->help_text('Use {year} to use the current year.'),
);

$script_fields = array(
	Carbon_Field::factory('separator', 'scripts', 'Scripts'),
	Carbon_Field::factory('header_scripts', 'header_script', 'Header script'),
	Carbon_Field::factory('footer_scripts', 'footer_script', 'Footer script'),
);

$carbon_fields = array_merge($general_fields, $script_fields);

Carbon_Container::factory('theme_options', 'Theme Options')
	->add_fields($carbon_fields);
?>
