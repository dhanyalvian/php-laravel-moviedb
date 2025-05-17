MAKEFLAGS=--no-print-directory make

run-server:
	php artisan serve --host 0.0.0.0 --port 8000

run-ts-collector:
	php artisan collect:movie ts

run-ts-worker:
	php artisan queue:work --queue=movie_ts


ts-create-collection:
	@echo "Create Typesense collection for:"
	@echo "1) Movie"
	@echo "2) TV"
	@echo "3) People"
	@read -p "Enter your choice [1-3]: " choice; \
	case $$choice in \
		1) $(MAKE) ts-create-collection-1 ;; \
		2) $(MAKE) ts-create-collection-2 ;; \
		3) $(MAKE) ts-create-collection-3 ;; \
		*) echo "Invalid choice" ;; \
	esac
ts-create-collection-1:
	@echo ""
	php artisan ts:collection movie
ts-create-collection-2:
	@echo ""
	php artisan ts:collection tv
ts-create-collection-3:
	@echo ""
	php artisan ts:collection people