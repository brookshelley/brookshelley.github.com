# latest posts

{% for post in site.posts limit: 4  %}
<a href="{{ post.url }}">{{ post.title }}</a>

{{ post.content }}
<hr />
{% endfor %}