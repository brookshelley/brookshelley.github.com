# latest posts

{% for post in site.posts limit: 4  %}
	
    <article>
    	<header>
			<h2><a href="{{ post.url }}">{{ post.title }}</a></h2>
		</header>
    	<section class="entry">{{ post.description }} <a href="{{ post.url }}">Read More</a>
		</section>
   		<div class="post-meta">
			<ul>
				<li>{{ post.date | date: "%B %d, %Y" }}</li>
				<!-- <li>Filed under: {% for category in post.categories %}<a href="{{ post.categories }}">{{ category | capitalize }}</a>  {% endfor %}</li>-->
			</ul>
		</div>
    </article>

{% endfor %}