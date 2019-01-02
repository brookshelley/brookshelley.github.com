# blog

## Posts

{% for post in site.categories.blog  %}
    {% capture this_year %}{{ post.date | date: "%Y" }}{% endcapture %}
    {% capture next_year %}{{ post.previous.date | date: "%Y" }}{% endcapture %}

    {% if forloop.first %}
    <h2 id="{{ this_year }}-ref">{{this_year}}</h2>
    <ul>
    {% endif %}

    <li><a href="{{ post.url }}">{{ post.title }}</a></li>

    {% if forloop.last %}
    </ul>
    {% else %}
        {% if this_year != next_year %}
        </ul>
        <h2 id="{{ next_year }}-ref">{{next_year}}</h2>
        <ul>
        {% endif %}
    {% endif %}
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
