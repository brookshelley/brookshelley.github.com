{% include nav.md %}

# posts

### 2018

## Posts

{% for post in site.categories.blog %}
<li>
  <a href="{{ post.url }}">{{ post.title }}</a>
   &nbsp;<span>{{ post.date | date_to_string }}</span>
</li>
{% endfor %}
[Older posts on Medium](https://medium.com/@brookshelley/)

## Media Diet

{% for post in site.categories.mediadiet %}
<li>
<a href="{{ post.url }}">{{ post.title }}</a>
</li>
{% endfor %}
