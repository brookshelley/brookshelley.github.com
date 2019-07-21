<h1>Latest Post</h1>
{% for post in site.posts limit:1 %}
... Show the first post all big ...
{% endfor %}
<h1>Recent Posts</h1>
{% for post in site.posts offset:1 limit:2 %}
... Show the next two posts ...
{% endfor %}