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
<br />
{% endfor %}
{% endfor %}

# Media Diet

{% assign postsByYear = site.categories.mediadiet | group_by_exp:"post", "post.date | date: '%Y'" %}
{% for year in postsByYear %}
## {{ year.name }}
<hr>
{% assign postsByMonth = year.items | group_by_exp:"post", "post.date | date: '%B'" %}
{% for month in postsByMonth %}
{% for post in month.items %}
<li><a href="{{ post.url }}">{{ post.title }}</a></li>
{% endfor %}
{% endfor %}
<br />
<br />
{% endfor %}
