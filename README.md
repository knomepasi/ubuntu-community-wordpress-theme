Ubuntu community teams WordPress theme
======================================

After setting the theme up
--------------------------

When the theme is set up, you will want to do the following things first:

### Create a menu and assign it to the "Header menu" theme location.
**[Appearance » Menus]**  
It's highly recommended to add the front page as the first item for this menu
since there is no link to the main page visible by default.

### Select a static page for the front page.
**[Settings » Reading]**  
Note: When you set a static page as the front page, its title will be hidden
by default. This is to ensure maximum flexibility to make the front page look
as you like. If you want to use a regular title on the front page, simply add
a "Heading 1" element to the beginning of the page.


Widget areas
------------

**Footnote widgets**
- Suitable for most widget types
- Creates equally sized columsn for all widgets
- Menus are laid out vertically

**Footer widgets**
- Suitable for menus and short text blocks
- Widgets are laid on top of each other
- Menus are laid out horizontally


Additional features
-------------------

### Notifications
To add notifications, simply add widgets to the "Notifications" widget area.

### Autocolumns for content
To create columns in content, use the following markup:
  [cols]
  ... Column content ...
  ///
  ... Column content ...
  [/cols]
You can add up to four separators (///) within one [cols] declaration to create
as many as five columns. If you wish to change the separator, edit the
'ubuntucommunity_columns_separator' option.

### Menu CSS classes
In the menu editing page, show CSS Classes from the screen options. After that,
you can use the following CSS classes to change the appearance of menu items:
	strong		Makes the text bold
