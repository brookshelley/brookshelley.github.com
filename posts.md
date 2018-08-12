[writing](index.md) | [posts](posts.md) | [books i read](books.md) | [movies i watched](movies.md) | [photos](http://vsco.co/brookshelley/images/1)

# posts

<div>
  <ul>
    {% for post in site.posts %}
    <li>
      <a href="{{ post.url }}" class="title">{{ post.title }}</a>
      <div class="title-desc">{{ post.description }}</div>
    </li>
    {% endfor %}
  </ul>
</div>

## post index
<ul>
  {% for post in site.posts %}
    <li>
      <a href="{{ post.url }}">{{ post.title }}</a>
    </li>
  {% endfor %}
</ul>
