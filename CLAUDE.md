# Green Smoke Studio website: notes for Claude

The site for Green Smoke Studio (www.greensmokestudio.com), owned by Lauren, a
graphic and web designer. Plain PHP, no database, no framework, hosted on
Krystal shared cPanel hosting. Read README.md first: it explains the structure,
content files, text styles, images and publishing.

## How Lauren works
- Uses **GitHub Desktop** and github.com, not the command line, apart from the
  local preview (`php -S localhost:8000 router.php`). Give GitHub Desktop steps.
- Comfortable with HTML, CSS and GitHub; not a PHP specialist. Explain in plain
  English, keep code readable, comment anything non-obvious.
- Private to-do list (Claude Doc, not in the repo):
  https://claude.ai/artifact/FRhywAGUHd7NZLpjd43dEQ
  Tick items off and add new ones as work is done.

## Rules
- **Work on a branch and open a pull request.** Never push to `main`: every
  change to `main` publishes to the live site automatically
  (.github/workflows/deploy.yml, SFTP to Krystal on port 722).
- Before suggesting a change: run `bash dev/check.sh` (every page in
  dev/urls.txt must load with no PHP messages), and compare screenshots before
  and after at desktop and phone widths. The visual design must not change
  unless that's the task.
- Escape output with `e()`; validate slugs with `valid_slug()` before reading
  files.
- No secrets in the repo. SFTP credentials are GitHub Actions secrets.
- Keep the site light: self-host assets, no new external scripts without asking.
  The only external script is the website carbon badge (unpkg), which Lauren
  wants to keep.

## Where things are
- Site details (address, email, social links, Journal categories, Work tags):
  `includes/config.php`
- Shared page parts: `includes/head.php`, `header.php`, `footer.php`
- Journal posts and Work projects: `content/journal/`, `content/work/`
  (one Markdown file each; `_template.md` explains the settings)
- Journal and Work layouts: `templates/`
- URL rules: `.htaccess` (live) and `router.php` (local preview); keep in step
- Fonts: Open Sans (variable, Light 300 is body text) and Playfair Display,
  both self-hosted in `fonts/`

## Decisions made
- Journal category addresses stay `/the-journal/design`, `/business`, `/studio`
  (plus `/case-studies`); only display names changed.
- Work cards link out to Behance; on-site project pages are a later option.
- Webflow clean-up (scripts, `w-` classes) comes before the design refresh.
- Brand fonts (Minion Pro, Gill Sans) need Adobe Fonts or web licences; not
  available now.
