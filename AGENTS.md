# AGENTS.md

Laravel 12 app (PHP ^8.2) managing an Indonesian Islamic boarding school ("pesantren"): public landing page plus an admin area with CRUD for students (`santri`), teachers (`guru`), classes (`kelas`), subjects (`mapel`), schedules (`jadwal`), attendance (`absensi`), finance (`keuangan`) with DomPDF exports, and site content (`visi-misi`, `program-unggulan`, `prestasi`, `berita`). All UI text is Indonesian.

## Commands
- `composer dev` — full dev loop: `artisan serve` + queue worker + Pail logs + `npm run dev` via `concurrently --kill-others`.
- `npm run build` / `npm run dev` — Tailwind v4 + Vite 7 frontend.
- `vendor/bin/pint` — code style (default Laravel preset; no pint config file).
- `composer setup` — fresh setup; copies `.env.example` which defaults to **SQLite**, not the real DB.
- `composer test` / `php artisan test` — runs PHPUnit via `phpunit.xml`.

## Environment gotchas
- Dev DB is **MySQL** `pesantren` (root, no password) set in `.env`. `.env.example` points at SQLite; don't regenerate `.env` from it unless you intend to switch.
- Tests force `sqlite :memory:` in `phpunit.xml`, but the local Laragon PHP 8.3 lacks the `pdo_sqlite` driver (`php -m` shows only `pdo_mysql`). `composer test` therefore currently fails with "could not find driver". Enable `pdo_sqlite` in Laragon's php.ini before running tests.

## Auth (custom, not Laravel's)
- Hand-rolled session login: `AuthController@login` validates then `session(['user' => $user])`; logout flushes the session. `User` is a plain `Authenticatable`; no auth guards or `auth` middleware are used — all admin routes in `routes/web.php` are publicly reachable.
- Admin user comes from `AdminSeeder` (called by `DatabaseSeeder`): `admin@gmail.com` / `admin123` via `php artisan db:seed`. Password is `Hash::make()`d, unrelated to the `hashed` cast.

## Database / models
- Domain tables are **singular**: `santri`, `guru`, `kelas`, `mapel`, `jadwal`, `absensi`, `jenis_pembayaran`, `pembayaran`, `pengeluaran`, `visi_misi`, `program_unggulan`, `prestasi`. Migration filenames mislead: `create_pembayarans_table.php` actually creates `pembayaran`.
- Most models set `protected $table` explicitly; **`Berita` does not** — it uses the default plural `beritas` (which matches its migration).
- Schema is evolved inline (add/drop column migrations), so `migrate:fresh` is safe and cheap to run.

## Routing gotcha
- `GET /dashboard` is registered **twice** in `routes/web.php`: a bare closure `view('pages.dashboard')` (line 32) shadows the later `DashboardController@index` route (line 36), since Laravel matches the first. Edits to `DashboardController` won't affect `/dashboard` until the duplicate route is removed.

## Conventions
- Admin views: flat Indonesian filenames under `resources/views/pages/` for santri/guru/kelas/mapel/jadwal (e.g. `datasantri.blade.php`, `tambahsantri.blade.php`); nested `pages/keuangan/` and `pages/informasi/` folders for the rest. PDF views live in `resources/views/pdf/`.
- Two layouts: `layout.app` (public landing) and `layout.appadmin` (admin). All PDFs use `Barryvdh\DomPDF\Facade\Pdf` (kwitansi, keuangan report, jadwal, absensi).