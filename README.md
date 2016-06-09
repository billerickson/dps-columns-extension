## Columns Extension for Display Posts Shortcode

Display posts in 2-6 columns. Example:

`[display-posts columns="2"]`


### Customization

This plugin adds a CSS file for the column classes. You can disable the CSS file if your theme already has column classes, or you [created your own column classes](http://www.billerickson.net/column-class-generator/) and added them to your themes stylesheet. 

Add this to your theme's functions.php file:

`add_filter( 'dps_columns_extension_include_css', '__return_false' );`

### Installation

[Download the plugin here](https://github.com/billerickson/dps-columns-extension/archive/master.zip), then upload it to your website. Plugins > Add New, then click "Upload Plugin" at the top of the page.