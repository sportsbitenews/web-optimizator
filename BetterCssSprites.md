# CSS Sprites Overview #

CSS Sprites as a powerful tool to merge different background images together with no restrictions in website layout or design, but with significant reduce in loaded objects number.

## What is a CSS Sprite? ##

CSS Sprite actually is a single image with a lot of images included. It is very similar to an image map. With `background-position` CSS property we can cut from this image required part and show it on the page. Also it's important to know actual dimensions of an object with background image - to make sure that other images from CSS Sprite won't be shown.

## How to use it? ##

You need to put all images together in one file and calculate their positions to insert into CSS rules. If you have several images it's not a complicated task. But if you have dozens or hundreds of images — this can be very tricky and time consuming to combine all of them into one or two CSS Sprites.

## How can I help? ##

WEBO Site SpeedUp automatically parses all CSS rules, finds all possible variants to use CSS Sprites and apply them. There a number of restrictions, so you can write your CSS and keep in mind general rules to help WEBO Site SpeedUp analyze you code better and improve performance of your website.

Few rules to write CSS code for better parsing.

  * Use only absolute positions in `background-position`. Using relative values (i.e. em, %, or even center, bottom, right) will force WEBO Site SpeedUp to compute dimensions of a mentioned block, and sometimes it can't be done for sure. If you can't set absolute positions - just try to set absolute dimensions for these blocks.
  * Use only absolute values in `width`, `height`, and `padding` properties. If WEBO Site SpeedUp finds absolute values for position but relative values for dimensions it can properly calculate better position for current background image. So it can be combined with a lot of free space around it, or even not combined.
  * Avoid using complicated CSS selectors for background images. WEBO Site SpeedUp can't parse all CSS rules tree correctly, it can apply only some actions to detect a number of required properties (`background-image`, `background-position`, `background-repeat`, `width`, `height`, `padding`). It's better for WEBO Site SpeedUp to have all these properties in one CSS selector (no ancestors), it's also better for accelerating rendering of your pages in browsers (due to decreased numbers of CSS selectors applied).
  * Try to exclude complicated cascading rules for background properties. For example instead of `li.item`, `.active`, `.passive` try to set `.menu li`, `.menu li.active`, `.menu li.passive`. Such cascade can be parsed with WEBO Site SpeedUp successfully.
  * Exclude unused CSS rules or move rarely used rules for pages where they are used. WEBO Site SpeedUp tries to combine all found images. It can't make sure which images are used on the current web page and which are not. So removing unused selectors reduces overall CSS Sprites size (and increases web pages rendering speed due to lesser amount of CSS selectors).
  * Do not use different `background-position` for the same background image if it's not a CSS Sprite. WEBO Site SpeedUp excludes images with multiple background position (as far as they seem to be Sprites), so such images won't be combined. You can also use margin in CSS rules as a possible alternative for `background-position`.

All these rules will help WEBO Site SpeedUp to analyze your CSS code structure and prepare better CSS Sprites.

## Additional notes ##

You can use magic word 'nosprites' in your classes, or ID, or attributes (in CSS code or in images names in HTML code) to skip CSS Sprites creation. This will work both for CSS and HTML Sprites. I.e. if you have
```
.link .nosprites{background:url(image.png)}
```
then `image.png` will be skipped from CSS Sprites routine. Also if you have in HTML code
```
&lt;img class="nosprites_additional" src="image.jpg" alt="My Image"/&gt;
```
`image.jpg` will be excluded from HTML Sprites creation.