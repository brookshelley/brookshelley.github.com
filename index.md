{% for post in site.posts limit: 4  %}
{{ post.content }}
<br />
[Permalink]({{ post.url }})

<hr />
{% endfor %}