# Integration with e-store #

## E-store caching features ##

E-store has both "almost static pages" (good and category pages) and completely dynamic pages (checkout process, personal account). During website acceleration process the first type of pages need to be correctly cached, and the second type must be excluded from caching.

## Changes in website templates ##

In order to provide dynamic caching for user data on e-store pages (i.e. e-cart state or favorites) you need to add the following CSS classes to website templates:
  * For WordPress - `widget_wp_digi_cart` for the whole e-cart block
  * For Joomla! - `vmCartModule` for the whole e-cart block
  * For the others - `wss_cart` for the whole e-cart block
Also you need to include CSS class `wss_cart_qty` for an element which holds total number of goods. For example:

```
<div class="tool-link wss_cart">
	<p><a href="/order/">Buy now!</a></p>
	Total:
	<span class="wss_cart_qty">0</span>
</div>
```

HTML block with class `wss_cart` will be cached on client side and inserted to all website pages. Pages with `wss_cart_qty` not equal to zero (e-cart is not empty) won't be cached on server-side.

If you need to add the same behavior to one more block on website pages you can use classes `wss_cart2`, `wss_cart2_qty`.

## Excludes for server-side caching ##

The second type of pages (compeltely dynamic ones) need to be excluded from server-side caching. You can implement this with 'Server side cache - List of parts of URLs' option. Here you need to set URL masks for all website pages which must not be cached. For example:

```
checkout order account
```

This way all pages which contain checkout, order, or account in their URL won't be cached on server.