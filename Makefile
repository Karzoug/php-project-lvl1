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

brain-prime:
	php bin/brain-prime

brain-even:
	php bin/brain-even

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin