build:
	docker compose build
run:
	docker compose up -d
bash-php:
	docker exec -it singelo_php bash
bash-nginx:
	docker exec -it singelo_nginx bash
start: run
stop:
	docker compose stop
down:
	docker compose down --rmi local
restart:
	docker compose restart
rebuild: down run
logs: 
	docker-compose logs	
