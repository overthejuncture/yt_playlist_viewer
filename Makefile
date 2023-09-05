.PHONY: app
up:
	docker-compose up -d
app:
	docker-compose exec app bash
down:
	docker-compose down
build:
	docker-compose build
