CREATE TABLE IF NOT EXISTS "migrations"(
  "id" integer primary key autoincrement not null,
  "migration" varchar not null,
  "batch" integer not null
);
CREATE TABLE IF NOT EXISTS "users"(
  "id" integer primary key autoincrement not null,
  "name" varchar not null,
  "email" varchar not null,
  "email_verified_at" datetime,
  "password" varchar not null,
  "remember_token" varchar,
  "created_at" datetime,
  "updated_at" datetime,
  "permissions" text
);
CREATE UNIQUE INDEX "users_email_unique" on "users"("email");
CREATE TABLE IF NOT EXISTS "password_reset_tokens"(
  "email" varchar not null,
  "token" varchar not null,
  "created_at" datetime,
  primary key("email")
);
CREATE TABLE IF NOT EXISTS "sessions"(
  "id" varchar not null,
  "user_id" integer,
  "ip_address" varchar,
  "user_agent" text,
  "payload" text not null,
  "last_activity" integer not null,
  primary key("id")
);
CREATE INDEX "sessions_user_id_index" on "sessions"("user_id");
CREATE INDEX "sessions_last_activity_index" on "sessions"("last_activity");
CREATE TABLE IF NOT EXISTS "cache"(
  "key" varchar not null,
  "value" text not null,
  "expiration" integer not null,
  primary key("key")
);
CREATE TABLE IF NOT EXISTS "cache_locks"(
  "key" varchar not null,
  "owner" varchar not null,
  "expiration" integer not null,
  primary key("key")
);
CREATE TABLE IF NOT EXISTS "jobs"(
  "id" integer primary key autoincrement not null,
  "queue" varchar not null,
  "payload" text not null,
  "attempts" integer not null,
  "reserved_at" integer,
  "available_at" integer not null,
  "created_at" integer not null
);
CREATE INDEX "jobs_queue_index" on "jobs"("queue");
CREATE TABLE IF NOT EXISTS "job_batches"(
  "id" varchar not null,
  "name" varchar not null,
  "total_jobs" integer not null,
  "pending_jobs" integer not null,
  "failed_jobs" integer not null,
  "failed_job_ids" text not null,
  "options" text,
  "cancelled_at" integer,
  "created_at" integer not null,
  "finished_at" integer,
  primary key("id")
);
CREATE TABLE IF NOT EXISTS "failed_jobs"(
  "id" integer primary key autoincrement not null,
  "uuid" varchar not null,
  "connection" text not null,
  "queue" text not null,
  "payload" text not null,
  "exception" text not null,
  "failed_at" datetime not null default CURRENT_TIMESTAMP
);
CREATE UNIQUE INDEX "failed_jobs_uuid_unique" on "failed_jobs"("uuid");
CREATE TABLE IF NOT EXISTS "roles"(
  "id" integer primary key autoincrement not null,
  "slug" varchar not null,
  "name" varchar not null,
  "permissions" text,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "roles_slug_unique" on "roles"("slug");
CREATE TABLE IF NOT EXISTS "role_users"(
  "user_id" integer not null,
  "role_id" integer not null,
  foreign key("user_id") references "users"("id") on delete cascade on update cascade,
  foreign key("role_id") references "roles"("id") on delete cascade on update cascade,
  primary key("user_id", "role_id")
);
CREATE TABLE IF NOT EXISTS "attachments"(
  "id" integer primary key autoincrement not null,
  "name" text not null,
  "original_name" text not null,
  "mime" varchar not null,
  "extension" varchar,
  "size" integer not null default '0',
  "sort" integer not null default '0',
  "path" text not null,
  "description" text,
  "alt" text,
  "hash" text,
  "disk" varchar not null default 'public',
  "user_id" integer,
  "group" varchar,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "attachmentable"(
  "id" integer primary key autoincrement not null,
  "attachmentable_type" varchar not null,
  "attachmentable_id" integer not null,
  "attachment_id" integer not null,
  foreign key("attachment_id") references "attachments"("id") on delete cascade on update cascade
);
CREATE INDEX "attachmentable_attachmentable_type_attachmentable_id_index" on "attachmentable"(
  "attachmentable_type",
  "attachmentable_id"
);
CREATE TABLE IF NOT EXISTS "notifications"(
  "id" varchar not null,
  "type" varchar not null,
  "notifiable_type" varchar not null,
  "notifiable_id" integer not null,
  "data" text not null,
  "read_at" datetime,
  "created_at" datetime,
  "updated_at" datetime,
  primary key("id")
);
CREATE INDEX "notifications_notifiable_type_notifiable_id_index" on "notifications"(
  "notifiable_type",
  "notifiable_id"
);
CREATE TABLE IF NOT EXISTS "books"(
  "id" integer primary key autoincrement not null,
  "title" varchar not null,
  "description" text,
  "author" varchar not null,
  "isbn" varchar not null,
  "published_date" date not null,
  "genre" varchar not null,
  "pages" integer not null,
  "language" varchar not null,
  "publisher" varchar not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "books_isbn_unique" on "books"("isbn");

INSERT INTO migrations VALUES(1,'0001_01_01_000000_create_users_table',1);
INSERT INTO migrations VALUES(2,'0001_01_01_000001_create_cache_table',1);
INSERT INTO migrations VALUES(3,'0001_01_01_000002_create_jobs_table',1);
INSERT INTO migrations VALUES(4,'2015_04_12_000000_create_orchid_users_table',2);
INSERT INTO migrations VALUES(5,'2015_10_19_214424_create_orchid_roles_table',2);
INSERT INTO migrations VALUES(6,'2015_10_19_214425_create_orchid_role_users_table',2);
INSERT INTO migrations VALUES(7,'2016_08_07_125128_create_orchid_attachmentstable_table',2);
INSERT INTO migrations VALUES(8,'2017_09_17_125801_create_notifications_table',2);
INSERT INTO migrations VALUES(9,'2025_04_29_145607_create_books_table',3);
