{% for post in site.posts limit: 4  %}
{{ post.content }}
<hr />
[Permalink]({{ post.url }}">{{ post.date }})
{% endfor %}