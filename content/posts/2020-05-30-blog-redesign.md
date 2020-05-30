---
type: posts
title: "Blog Redesign"
date: 2020-05-30
description: on redesigning this site
tags:
  - CSS
  - design
---

My personal site [started off](https://medium.com/@brookshelley/why-i-built-a-markdown-book-blog-a07e1a6dd163) as a way to keep track of books and movies I’d read and watched outside of the world of Goodreads or other ad-based sites. I’ve lost lots of data in the past, and ultimately it’s just much easier to keep text portable and backed-up when it’s a `.txt` or `.md`

In the ensuing years, I’ve written a few blog posts, and listed tons of books and movies but I hadn’t done much with my site’s structure or design besides moving my static site generator from [Jekyll](https://jekyllrb.com) to [Hugo](https://gohugo.io) on a whim last year. I can’t say that I like Go templating any better than Ruby, but I can struggle through both of them. With a site publishing workflow that automatically builds and deploys from Github using Github Actions, I’m set on the backend front, and decided to give my front end skills a dusting-off from my days in CSS 1.0 land.

## A start at design

My initial foray into the design of the site was just to use an off-the-shelf theme called [Ezhil](https://themes.gohugo.io/ezhil/), which worked pretty well for a while. Sure, there were creaky bits, and a lot of extraneous things I didn’t care for, but it was easy to install, and use, so I went for it. Hugo and Jekyll, and even [Eleventy](https://www.11ty.dev) (if you’re a JS person) have dozens of fantastic themes and templates from folks far more talented at CSS than myself, but I’ve found my site doesn’t feel like it’s mine until I’ve done some under the hood tinkering. 

## A long week

With a three day work week, I got the jones for change. I’d tweaked the initial theme a bit to iron out features I didn’t like, but ultimately I think I made a bit of a mess of the site until now. Inspired by [Frank Chimero’s long redesign process](https://frankchimero.com/blog/2020/redesign-wrapping-up/) I decided to radically simplify my site, and try to get a total load time of under two seconds. I accomplished both of my goals, but I have a way to go before I’m fully happy with the type and margins. Fortunately, I learned a lot o CSS tricks along the way, and even dipped my toes into CSS Grid in [another repo](https://github.com/brookshelley/brookshelley). 

## Fonts & hierarchy

For this 2020 version of my site, I moved to [Quicksand](https://fonts.adobe.com/fonts/quicksand) as my sans-serif, and decided to add [Source Serif Pro](https://fonts.adobe.com/fonts/source-serif) to make reading longer content like this much easier. As someone who is very much _not_ a designer, I _think_ the two go together ok, but hopefully my actual designer friends will give me feedback at some point to save me from any _fauxnt pas_. 

For header elements, I tried to let them breathe with a big top and bottom margin. I couldn’t stomach the full 4em that Frank Chimero uses on his site, but 2em felt nice enough, especially on my iPhone. Since I was regularly testing this site on light and dark modes, on my iPad, MacBook, and iPhone, I was able to work out a lot of responsive kinks along the way.

Honestly, I’m happy I figured out most of the margins and centering CSS amongst the tangle of elements. While I was dealing with my site’s code, a friend reminded me “hell is other people’s CSS,” and that will ring in my head until I inevitably replace all of the elements and classes in `main.css`. It’s frustrating not always knowing what changes will actually be reflected in the browser due to confusing nested values. More on this in the future along with potential font changes.

## Simpler menus

In his redesign blog, Frank talked about removing his reading and music lists by relocating them to [Notion](https://www.notion.so/Reading-Log-3341e831fc744130bf536a54cd79ec56). This isn’t a terrible idea, and I definitely like the added simplicity of his menus because of it, but my priority remains holding onto plain text versions of my lists, so that’s out for me. I thought about ways of auto-populating them when I write my media diets, but outside of a few ideas around templating I have stuck to manually copying over items for those posts. Perhaps there isn’t a need for media diets and exhaustive lists to exist? For now, I’ll keep the two lists in my top level nav, with secondary links in the media diet section.

## Light is fast

To hit my goal of an under two second load time, I gutted a few javascript files, before realizing I didn’t need them at all. Instead of `feather.min.js`, I just inlined the few SVG icons I wanted, and threw them in my footer partial. Bingo bango. 

I dug into my CSS file and tried to remove everything that’s not necessary, and during the aforementioned margin struggle that meant dozens of lines of code. I also managed to bring down the total site size by 10s of Mb by using [Image Optim](https://imageoptim.com/mac) to do what it says on the tin. [This post](https://developers.google.com/web/fundamentals/performance/optimizing-content-efficiency/automating-image-optimization/) is a really great read if you want to dig further into image optimization, or learn just how bloated your site might actually be.

At the end of all of my optimizing and spring-cleaning, I hit 1.9s of load time, with a responsive design that works in light or dark mode (though light mode doesn’t get SVG icons yet because I got sleepy). I’m pretty proud of the [results I got on web.dev](https://lighthouse-dot-webdotdevsite.appspot.com//lh/html?url=https%3A%2F%2Fwww.brookshelley.com) at the end of all my hard work, but I still need to sort out a more efficient caching strategy for a few odds and ends.

## What I learned

Ultimately, I re-learned that in the year 2020, the fastest way to build a website is still to use mostly static HTML and CSS, and ditch the JavaScript completely. Web fonts are still weird, though it turns out doing [preloading](https://csswizardry.com/2020/05/the-fastest-google-fonts/) can help a bit with speed. Hopefully I’ll figure out a few more things about margins, padding, and site hierarchy as I keep tweaking this design, but I’m pretty happy with how it looks so far.