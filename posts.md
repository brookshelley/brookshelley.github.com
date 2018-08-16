[writing](index.md) | [posts](posts.md) | [books i read](books.md) | [movies i watched](movies.md) | [photos](http://vsco.co/brookshelley/images/1)

# posts

### 2018

## Posts
{% for post in site.categories.blog %}
  <li>
    <span>{{ post.date | date_to_string }}</span> &nbsp;
    <a href="{{ post.url }}">{{ post.title }}</a>
  </li>
{% endfor %}

## Media Diet

{% for post in site.categories.mediadiet %}
  <li>
    <a href="{{ post.url }}">{{ post.title }}</a>
  </li>
{% endfor %}
