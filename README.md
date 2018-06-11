# ulicms-absolutify

Prepends a base url to relative links in html code

## Requirements

**absolutify** is compatible with UliCMS 2018.3 or later.

## Usage

The signature of the function is

```php
absolutify($html, $baseUrl = null)`
```

* `$html` is a html input string.
* `$baseUrl` is a base url including protocol and domain.

   if `$baseUrl` is null the base url is determined with `ModuleHelper::getBaseUrl()`.

```php
// this will return the string '<p>Lorem Ipsum Sit dor <a href="http://www.mydomain.com/mypage.html">amet</a></p>'
$html = absolutify('<p>Lorem Ipsum Sit dor <a href="/mypage.html">amet</a></p>', "http://www.mydomain.com");
```