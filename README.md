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
