---
layout: micropubpost
date: '2020-09-04T22:31:49.013Z'
title: Hugo and iA Writer
mf-post-status:
  - draft
slug: hugo-and-i-a-writer
lang: en
---

When I started [writing my blog in earnest again](https://www.brookshelley.com/posts/2017-08-01-markdown-books-blog/), I wanted to find a workflow I could use on both iOS and Mac with ease. I use an iPad and iPhone mostly, so I didn&#39;t want a system that required a lot of fiddliness, which meant a build pipeline that automated as much as possible. My goal was a site I could write to, publish to, and read from with a minimum of app switching or ssh-ing.

## Static site

Originally, I was using Jekyll, as it&#39;s the basic GitHub Pages static site generator, but I fell for the speed and weird Go templating of Hugo. I&#39;ve tested Eleventy and Gatsby as well, but Hugo remains my top pick. I built a custom theme for my site, along with a SASS file that hopefully is organized enough I could do some easy switching around if I get itchy for a redesign.

In order to build my site fast, and ensure it loads super quickly, I moved to system fonts which meant I&#39;ve achieved a delightful 1.0s full-content load time. No matter where or how someone accesses my site, they&#39;re sure to need limited bandwidth and data to read it.

If you want to read more about Hugo, [their website](https://gohugo.io) is pretty great. You&#39;re also welcome to [creep my repo](https://github.com/brookshelley/brookshelley.github.com), and even fork it to get started yourself. My theme is very basic, but there are a [ton of them](https://themes.gohugo.io) out there to suit most tastes.

## Build pipeline

Once GitHub launched their Actions feature I was pretty sure I could go without a separate CI app or something like Netlify (though Netlify in specific is pretty awesome and has a really good DNS feature I still use). There are a bunch of cool Actions out there for building and launching static sites, but I use `[actions-hugo](https://github.com/peaceiris/actions-hugo)` from Shohei Ueda.

It&#39;s super simple, and here&#39;s the yaml:

```YAML
name: github pages

on:
  push:
    branches:
      - main  # Set a branch to deploy

jobs:
  deploy:
    runs-on: ubuntu-18.04
    steps:
      - uses: actions/checkout@v2
        with:
          submodules: true 
          fetch-depth: 0

      - name: Setup Hugo
        uses: peaceiris/actions-hugo@v2
        with:
          hugo-version: ‘0.71.1’
            extended: true

      - name: Build
        run: hugo --minify

      - name: Deploy
        uses: peaceiris/actions-gh-pages@v3
        with:
          github_token: ${{ secrets.GITHUB_TOKEN }}
          publish_dir: ./public
```

Essentially, you set your public branch, and Github actions for pulling Hugo, building your site, and the deploying it to the public directory run in order. The whole process takes around 30 seconds with the `hugo --minify` build step completing in 400ms. Kicking off the whole build only takes pushing an update to the source branch I use. Other than that push, there&#39;s no real manual input required.

## iA Writer

![iawriter](/photos/iawriter.jpg)

My love for iA Writer continues to grow every year. It&#39;s not just a fantastic place to write, but increasingly it&#39;s a solid platform to publish to the indie web from. With one-click flows for Micro.Blog, Micropub, Wordpress, and other sites, it&#39;s super easy to write and get something online. My only wish is that somehow it could support photo upload in the same manner. I also love the Quattro font the team at iA Writer created as a slightly variable monospaced font. Their support of iOS, Mac, and the iPad is excellent, not to mention very good keyboard shortcuts for all of them. Simply put, iA Writer is my favorite place to write and create.

## Testing

The only part of this whole process I haven&#39;t sorted out is testing builds from my iPad or iPhone. I may need to use Netlify again to do so, because while I have the ability to run things on another server, I&#39;m a bit lazy when it comes to setting up rules around port forwarding. Most of the time if I&#39;m doing active development of my site, I try to use a Mac or just very lazily roll changes out at night, reverting or fixing forward if there&#39;s an issue. Luckily a broken build never deploys, so worst case I might just put a post up that&#39;s missing photos, or have some odd spacing.

I would never recommend doing this for something that super matters, but my website is a fun little project, so it doesn&#39;t need five 9s of uptime.

## Publishing with Micropub

I previously covered this with [another post](https://www.brookshelley.com/posts/microposting/). I didn’t do much customization to the GitHub code I linked to in that post, so your mileage may vary, but using Heroku for free, I’m able to tap publish on iA Writer for a nice, easy update to this blog. Previously I used the iOS Shortcut linked below, which was also fine, but during the beta period became a bit unwieldy in addition to not being available on my Mac. I briefly considered an Automator action to replicate the same features, but hopefully at some point shortcuts will come to the Mac￼ instead. I might update my Micropub server at some point to remove some of the weird stuff I don&#39;t really use from it, but that&#39;s a project for another vacation.

## iOS Shortcuts

[My iOS Shortcut flow](https://www.icloud.com/shortcuts/fcea1fc7792a4be7952e9d4ac6e34018) is pretty straightforward, and I snagged a lot of it from other examples online. The only semi-fancy bits are the text-parsing I use to title and build metadata. iOS Shortcuts are kind of a pain-in-the-ass, but once you get used to the weird way of building them semi-visually, they&#39;re pretty powerful.

## Wrap-up

My site has come a long way from when I [started it up again](https://www.brookshelley.com/posts/2017-08-01-markdown-books-blog/) three years ago, while leaving [Medium](https://medium.com/@brookshelley) as a platform. Hell, Medium has changed focuses four or five times in that period as well, now going back towards a [customizable blogging place](https://blog.medium.com/whats-around-the-corner-for-medium-b79e8764c9cd). I&#39;m pretty happy I set up my own little world of blogging and archiving content, and hopefully with the information above you can do the same if you want.
