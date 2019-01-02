# Posts

{% assign postsByYear = site.categories.blog | group_by_exp:"post", "post.date | date: '%Y'" %}
{% for year in postsByYear %}
## {{ year.name }}
<hr>
{% assign postsByMonth = year.items | group_by_exp:"post", "post.date | date: '%B'" %}
{% for month in postsByMonth %}
### {{ month.name }}
{% for post in month.items %}
<li><a href="{{ post.url }}">{{ post.title }}</a>
&nbsp;<span>{{ post.date | date_to_string }}</span></li>
{% endfor %}
{% endfor %}
{% endfor %}

[Older posts on Medium](https://medium.com/@brookshelley/)

# Media Diet

{% assign postsByYear = site.categories.mediadiet | group_by_exp:"post", "post.date | date: '%Y'" %}
{% for year in postsByYear %}
## {{ year.name }}
{% for post in year.items %}
<li><a href="{{ post.url }}">{{ post.title }}</a>
&nbsp;<span>{{ post.date | date_to_string }}</span></li>
{% endfor %}
{% endfor %}
{% endfor %}


{% for post in site.categories.mediadiet %}
<li>
<a href="{{ post.url }}">{{ post.title }}</a>
</li>
{% endfor %}
