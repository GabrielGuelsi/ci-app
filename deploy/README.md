# Deploy — Flowin lead integration

Form submissions (`/assessment-lead` and `/start-your-plan`) keep their current
behaviour (save to DB + internal email) and now also dispatch a queued
`App\Jobs\SyncLeadToFlowin` job that POSTs the lead to the Flowin CRM webhook.

The HTTP call runs on the queue so a Flowin outage never breaks or slows the
user's form submission. **A queue worker must be running in production** for the
job to actually deliver. Without a worker the leads are **not lost** — they stay
in the `jobs` table until a worker runs.

## 1. Environment

Set in production `.env` (the secret is provided by the Flowin team):

```
FLOWIN_WEBHOOK_URL=http://127.0.0.1:8090/api/webhook/marketing-lead
FLOWIN_WEBHOOK_SECRET=<from Flowin team>
QUEUE_CONNECTION=database
```

If either `FLOWIN_WEBHOOK_URL` or `FLOWIN_WEBHOOK_SECRET` is empty, the job logs
a warning and skips (so staging without the secret does not pile up failures).

## 2. Queue worker

Use the sample Supervisor program in `deploy/flowin-queue-worker.conf`:

```bash
sudo cp deploy/flowin-queue-worker.conf /etc/supervisor/conf.d/
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start flowin-queue-worker:*
```

(Adjust the `command` path / `user` to match the server. A systemd unit running
`php artisan queue:work --queue=default --tries=5 --max-time=3600` works too.)

## 3. After every deploy

Restart the worker so it picks up new code:

```bash
php artisan queue:restart
```

## Behaviour notes

- The webhook deduplicates by phone/email, so retries are safe (they update the
  same lead, never duplicate). The job retries 5 times with exponential backoff
  (`10, 30, 60, 300, 900` seconds) before landing in `failed_jobs`.
- Inspect failures with `php artisan queue:failed` and retry with
  `php artisan queue:retry all`.
