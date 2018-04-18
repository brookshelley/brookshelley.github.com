[writing](index.md) | [about](about.md) | [books i read](books.md) | [movies i watched](movies.md) | [photos](http://vsco.co/brookshelley/images/1)

# about
a noted sapphist, Brook travels often, writes, and speaks about
queer issues, tech, and witchcraft.

<ul>
  {% for post in site.posts %}
    <li>
      <a href="{{ post.url }}">{{ post.title }}</a>
    </li>
  {% endfor %}
</ul>
