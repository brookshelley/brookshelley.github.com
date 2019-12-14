{% for post in site.posts limit: 4  %}
<h1>{{ post.title }}</h1>
{{ post.content }}
<br />
[Permalink: {{ post.title }}]({{ post.url }})
<hr />
{% endfor %}

View the <a href="/posts">archive</a>