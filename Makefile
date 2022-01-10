install:
	composer install

brain-games:
	php bin/brain-games

brain-calc:
	php bin/brain-calc

brain-gcd:
	php bin/brain-gcd

brain-progression:
	php bin/brain-progression

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin