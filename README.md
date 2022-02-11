# Escape Links Plugin

## Shortcode Formats
* [exit-link] or [exit-link /]
* [exit-link]Custom Link Text[/exit-link]
* [exit-link type=text]
* [exit-link type=button]

The plugin shows "Exit Site" by default if the self closing versions of the shortcode (i.e. [exit-link]) are used.

If using both enclosing and self-closing instances of this shortcode on the same page, make sure to add a trailing forward slash (/) to the self-closing instances of the shortcode. 

The WordPress shortcode parser does not handle the mixing of enclosing and non-enclosing forms of the same shortcode and you will not get the results you want.

https://developer.wordpress.org/plugins/shortcodes/enclosing-shortcodes/#limitations

## Missing Admin Bar?
The plugin has been built (by request) to run all code for logged-in and non-logged-in users. This means that logged-in users who click an escape link set by this plugin will not see the admin bar on the front end of the site until they log out and log back in again.
