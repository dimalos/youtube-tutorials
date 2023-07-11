build: up

up:
	docker network create --driver bridge youtube-network || true
	mkdir -p .infrastructure/.redis
	docker-compose -f .infrastructure/docker-compose/docker-compose.yml -f .infrastructure/docker-compose/docker-compose.dev.yml -f .infrastructure/docker-compose/docker-compose.common.yml up -d --build