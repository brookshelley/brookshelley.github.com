# blog

## Posts

{% assign postsByYear = site.posts | group_by_exp:"post", "post.date | date: '%Y'" %}
    {% for year in postsByYear %}
      <h1>{{ year.name }}</h1>
      {% assign postsByMonth = year.items | group_by_exp:"post", "post.date | date: '%B'" %}

      {% for month in postsByMonth %}
        <h2>{{ month.name }}</h2>
        <ul>
          {% for post in month.items %}
            <li><a href="{{ post.url }}">{{ post.title }}-{{ post.date }}</a></li>
          {% endfor %}
        </ul>

      {% endfor %}
    {% endfor %}

{% for post in site.categories.blog %}
<li>
  <a href="{{ post.url }}">{{ post.title }}</a>
   &nbsp;<span>{{ post.date | date_to_string }}</span>
</li>
{% endfor %}
[Older posts on Medium](https://medium.com/@brookshelley/)

## Media Diet

{% for post in site.categories.mediadiet %}
<li>
<a href="{{ post.url }}">{{ post.title }}</a>
</li>
{% endfor %}
