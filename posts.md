[writing](index.md) | [posts](posts.md) | [books i read](books.md) | [movies i watched](movies.md) | [photos](http://vsco.co/brookshelley/images/1)

# posts

### 2018

## Posts
<ul class="article-list">
  {% for post in site.posts %}
    <li>
      <a href="{{ post.url }}">{{ post.title }}</a>
      <div class="title-desc">{{ post.description }}</div>
    </li>
  {% endfor %}
</ul>

## Media Diet

{% for post in site.categories.mediadiet %}
  <li>
    <span>{{ post.date | date_to_string }}</span> &nbsp;
    <a href="{{ post.url }}">{{ post.title }}</a>
  </li>
{% endfor %}
