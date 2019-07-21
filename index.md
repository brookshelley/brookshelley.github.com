{% for post in site.posts limit: 4  %}
{{ post.content }}
<br />
[{{ post.title }}]({{ post.url }})
<hr />
{% endfor %}