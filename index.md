{% for post in site.posts limit: 4  %}
{{ page.title }}
{{ post.content }}
<br />
[Permalink: {{ post.title }}]({{ post.url }})
<hr />
{% endfor %}

View the <a href="/posts">archive</a>