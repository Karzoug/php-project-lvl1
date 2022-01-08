install:
	composer install

brain-games:
	php bin/brain-games

brain-calc:
	php bin/brain-calc

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin