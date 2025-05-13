run-server:
	php artisan serve --host 0.0.0.0 --port 8000

run-ts-collector:
	php artisan collect:movie ts

run-ts-worker:
	php artisan queue:work --queue=movie_ts