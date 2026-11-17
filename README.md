# Green Smoke Studio website

Plain PHP, no database. Pages share one header and footer (`includes/`), and
Journal posts and Work projects are simple text files in `content/`.

## Add a Journal post

1. In `content/journal/`, copy `_template.md` and rename the copy, e.g.
   `my-new-post.md`. Use lower case, numbers and hyphens only: the file name
   becomes the web address (`/the-journal/design/my-new-post`).
2. Fill in the settings at the top (title, date, category, summary). The
   template explains each one.
3. Write the article under the second `---` line. A blank line starts a new
   paragraph; `### text` is a large pull quote, `##### text` a small heading,
   `[words](https://link)` a link.
   See **Text styles** below for everything you can type.
4. Optional image: put it in `images/journal/` and set `image:` to its path.
5. Leave `draft: true` while writing. Drafts only appear when you preview on
   your own computer. Change it to `draft: false` to publish.
6. Commit in GitHub Desktop. The Journal page, category page, homepage
   "latest" link and sitemap all update themselves.

You can also do all of this on github.com: open the `content/journal` folder,
click **Add file** → **Create new file**, paste the template, and commit.

**Coming soon posts:** set `coming_soon: true` to list a post as "Coming soon"
without a page.

**Categories** (names, intro text, default images) are set in
`includes/config.php`. A category appears in the Journal menu once it has a post.

### Text styles

What to type in a post, and what you get. To see them all in your site's
look, preview locally and open
http://localhost:8000/the-journal/studio/style-guide (it's a draft, so it's
never published; the file is `content/journal/style-guide.md`).

| Type this | You get |
| --- | --- |
| `**bold**` | **bold** |
| `*italic*` | *italic* |
| `[words](https://example.com)` | a link (other websites open in a new tab) |
| `[words](/work)` | a link to a page on your own site |
| `## Heading` | large heading in Playfair Display |
| `### Text` | pull quote: big, light statement |
| `#### Text` | soft, faded subheading |
| `##### Text` | small heading (used for numbered points) |
| `###### Text` | small faded capitals, for a label |
| `> Text` | quote with a grey bar down the left |
| `- item` (one per line) | bulleted list |
| `1. item` (one per line) | numbered list |
| `![description](/images/journal/photo.jpg)` | an image |
| `---` on its own line | dividing line |
| `<br>` on its own line | extra space (e.g. above and below a pull quote) |

Leave a blank line between paragraphs, headings and lists.

## Add a Work project

1. In `content/work/`, copy `_template.md` and rename the copy, e.g.
   `cowells-garden-centre.md`.
2. Put a cover image in `images/work/` and fill in the settings: title, tags,
   summary, image, and `link` (the project on Behance).
3. Tags must match the list in `includes/config.php` (UX Design, Branding,
   Printed Materials, Web Design, Web Development, Digital Design). Separate
   several with commas. The filter buttons on the Work page update themselves.
4. Commit.

## Images

Save images as JPG, about 2000px wide. To make smaller copies for phones (the
site uses them automatically), run in Terminal from the repo folder:

```bash
bash dev/make-image-sizes.sh images/work/my-project.jpg
```

## Preview on your computer

1. In GitHub Desktop, choose the branch from **Current Branch** and click
   **Fetch origin** / **Pull origin**.
2. **Repository** → **Open in Terminal**, then run:
   ```bash
   php -S localhost:8000 router.php
   ```
3. Open http://localhost:8000. Press `Ctrl` + `C` in Terminal to stop.

## Publishing

The site publishes itself. Whenever `main` changes (for example when you merge
a pull request, or commit straight to `main`), GitHub:

1. **Checks the site**: every page must load with no PHP errors.
2. **Uploads only what changed** to Krystal over SFTP. Files removed from the
   repo are removed from the server too, but nothing else on the server is
   touched.

Watch it in the repo's **Actions** tab. A green tick means it's live (usually
within a minute or two); a red cross means nothing was uploaded, and the
details say why. Pull requests get the check too, but are never uploaded.

### Roll back to an earlier version

1. Find the commit you want: on GitHub, click **Commits** (or use History in
   GitHub Desktop) and copy its ID, e.g. `3117ea6`.
2. **Actions** → **Deploy to Krystal** → **Run workflow**, paste the ID in
   "Version to publish", and click **Run workflow**.

The site then matches that version exactly. The next change merged to `main`
publishes the latest version again, so also undo the bad change on `main`
(in GitHub Desktop: right-click the commit → **Revert changes in commit**).

Tick "Only list what would change" to see what a run would do without
uploading anything.

### One-time setup

In the GitHub repo: **Settings** → **Secrets and variables** → **Actions** →
**New repository secret**. Add:

| Name | Value |
| --- | --- |
| `SFTP_HOST` | Your Krystal server's address (in your Krystal welcome email or client area) |
| `SFTP_USER` | Your cPanel username |
| `SFTP_PASSWORD` | Your cPanel password |
| `SFTP_KNOWN_HOSTS` | The server's identity, so uploads can only go to the real server. In Terminal run `ssh-keyscan -p 722 YOUR-SERVER-ADDRESS` and paste everything it prints |

Secrets can't be read back by anyone, including you, once saved. If you change
your cPanel password, update `SFTP_PASSWORD` too.

In cPanel, **MultiPHP Manager** should have the site on PHP 8.3 or newer.

## Site details

The address, email, company number and social links live in
`includes/config.php`. Change them there and every page updates.

## Folders

| Folder | What's in it |
| --- | --- |
| `content/` | Journal posts and Work projects (one file each) |
| `includes/` | Shared page parts and settings |
| `templates/` | Layouts for Journal pages and Work cards |
| `css/`, `js/`, `fonts/`, `images/` | Styles, scripts, fonts and images |
| `dev/` | Tools and checks, not uploaded to the live site |
| `.github/workflows/` | The automatic publishing set-up |
