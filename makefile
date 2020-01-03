run-docs: ## Run in development mode
	hugo serve -D

docs: ## Build the site
	hugo -d public --gc --minify --cleanDestinationDir
