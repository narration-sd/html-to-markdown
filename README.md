# Craft html-to-markdown plugin

*(very preliminary documentation)*

## Description

This plugin implements HTML to Markdown conversion for Craft 3.

It provides Twig filter extension for The Php League's html-to-markdown library, and allows using their options where desired.

## Licensing

Will decide when adding to the Craft Store shortly. This plugin is copyrighted. This is a pre-release beta for development use only.

## Installation

As with any other plugin, once present in your Craft Plugins page, you'll want to Install there.

## Usage

Employing html-to-markdown is straightforward. Given you have a Twig variable containing html, emit it using the html-to-markdown filter.

For example:

```
{% set testhtml = '<h3>Here\'s a bit of Markdown from html...</h3> %}

<pre>{{ testhtml | htmltomarkdown }}</pre>
```
This will result in very simple: 
```
### Here's a bit of Markdown from html...
```

If there are multiple lines, this won't show on your browser screen as whitespace is reduced, but returns and spacing are proper, as you can verify using view-source or in your intended application.

## Options

For whitespace, and for translation of emphasis html codes, there are optional behaviors available with the League library. 

You can implement these by providing an array of options you want to use, and passing these to the function form of this html-to-markdown filter.

Here's a more extensive example showing several options being used. 

```
{% set testhtml = '<h3>Here\'s a bit of Markdown from html...</h3>
  <p>We can control how <em>em</em> and <strong>strong</strong> come out.</p>
<p>a break here..<br>and there it was.</p>
<p>Images show as expectedin Markdown source  when you set the alt: <img src="https://narrationsd.com/resources/images/share/svolvaer.jpg" alt="The image"> <p>
<p>And links are as you expect, <a href="https://narrationsd.com">Cobbler Shoes</a></p>' %}

<pre>{{ testhtml | htmltomarkdown }}</pre>

{% set options = {
  italic_style: '*',
  bold_style: '__',
  hard_break: true }
%} {# hard_break true is not default; true means Github Markdown style #}

<h2>Here with some options set:</h2>
<pre>{{ testhtml | htmltomarkdown(options) }}</pre>

```
The results will be as follows, presuming your Markdown reader handles html, or if you try the code online in a browser. The Markdown itself will show the images and the link as expected. 


<h2>Html to Markdown Test</h2>


<pre>### Here's a bit of Markdown from html...

We can control how _em_ and **strong** come out.

a break here..  
and there it was.

Images show as expected in Markdown source when you set the alt: ![The image](https://narrationsd.com/resources/images/share/svolvaer.jpg)

And links are as you expect, [The Cobbler's Shoes](https://narrationsd.com)</pre>

 
<h2>Here with some options set:</h2>
<pre>### Here's a bit of Markdown from html...

We can control how *em* and __strong__ come out.

a break here..
and there it was.

Images show as expected in Markdown source when you set the alt: ![The image](https://narrationsd.com/resources/images/share/svolvaer.jpg)

And links are as you expect, [The Cobbler's Shoes](https://narrationsd.com)</pre>

n.b. You may note that the distinction for the `hard_break` option is quite subtle, but it is there, and the descriptoiin can be found from the link in the next section.

## Documentation for Options

Since we are passing your array of options to the League's library, you can find the capabilities and limitations nicely laid out on their Github page: https://github.com/thephpleague/html-to-markdown.
