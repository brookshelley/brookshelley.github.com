<h1>Latest Post</h1>
{% for post in site.posts limit:1 %}
{% endfor %}
<h1>Recent Posts</h1>
{% for post in site.posts offset:1 limit:2 %}
{% endfor %}