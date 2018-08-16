[writing](index.md) | [posts](posts.md) | [books i read](books.md) | [movies i watched](movies.md) | [photos](http://vsco.co/brookshelley/images/1)

# posts

### 2018

## Posts
{% for post in site.categories.blog %}
  <ul>
    <li>
      <a href="{{ post.url }}">{{ post.title }}</a>
       &nbsp;<span>{{ post.date | date_to_string }}</span>
    </li>
  </ul>
{% endfor %}

## Media Diet

{% for post in site.categories.mediadiet %}
  <ul>
    <li>
      <a href="{{ post.url }}">{{ post.title }}</a>
    </li>
  </ul>
{% endfor %}
